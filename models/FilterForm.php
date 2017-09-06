<?php
namespace yii2learning\chartbuilder\models;
use kartik\daterange\DateRangeBehavior;
use yii\base\Model;
use common\models\User;

/**
 * Stat form
 */
class FilterForm extends Model
{
    public $dateRange;
    public $startDate;
    public $endDate;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateRange'], 'safe'],
            [['dateRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'dateRange',
                'dateStartFormat'=>false,
                'dateEndFormat' => false,
                'dateStartAttribute' => 'startDate',
                'dateEndAttribute' => 'endDate',
            ]
        ];
    }

    public function attributeLabels(){
        return [
            'dateRange' => 'วันที่'
        ];
    }

}
