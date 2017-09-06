<?php

namespace yii2learning\chartbuilder\models;

use Yii;

/**
 * This is the model class for table "{{%cb_chart_type}}".
 *
 * @property string $code
 * @property string $name
 * @property string $image
 * @property integer $sort
 */
class ChartType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cb_chart_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['sort'], 'integer'],
            [['code'], 'string', 'max' => 100],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    /**
     * @inheritdoc
     * @return ChartTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChartTypeQuery(get_called_class());
    }
}
