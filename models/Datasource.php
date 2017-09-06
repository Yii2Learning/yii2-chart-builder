<?php

namespace yii2learning\chartbuilder\models;

use Yii;

/**
 * This is the model class for table "{{%cb_datasource}}".
 *
 * @property string $id
 * @property string $name
 * @property string $query
 * @property string $hospcode
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['query', 'params'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['name'], 'string', 'max' => 255],
            [['hospcode'], 'string', 'max' => 5],
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
            'hospcode' => Yii::t('app', 'Hospcode'),
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
}
