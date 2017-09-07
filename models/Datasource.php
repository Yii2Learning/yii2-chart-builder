<?php

namespace yii2learning\chartbuilder\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%cb_datasource}}".
 *
 * @property string $id
 * @property string $name
 * @property string $query
 * @property string $params
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Datasource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cb_datasource}}';
    }

    public function behaviors(){
        return [
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'id',
                ],
                'value' => function ($event) {
                    return \thamtech\uuid\helpers\UuidHelper::uuid();
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'params',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'params'
                ],
                'value' => function ($event) {
                    return  is_array($this->params) ? implode(',',$this->params) : $this->params;
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','query'], 'required'],
            [['query', 'params'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['id','connection_id'], 'string', 'max' => 36],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'query' => Yii::t('app', 'Query'),
            'params' => Yii::t('app', 'Params'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @inheritdoc
     * @return DatasourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DatasourceQuery(get_called_class());
    }


    public function prepareParams(){
          $newParams = [];
          $keys = [];
          if(is_array($this->params)){
              foreach($this->params as $value){
                $v = str_replace(':','',$value);
                if(in_array($v,$keys)){
                  $newParams[$value] = $this->filterModel->attributes[$v];
                }
              }
          }
          return  $newParams;
      }
}
