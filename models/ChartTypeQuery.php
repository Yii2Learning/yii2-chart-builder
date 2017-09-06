<?php

namespace yii2learning\chartbuilder\models;

/**
 * This is the ActiveQuery class for [[ChartType]].
 *
 * @see ChartType
 */
class ChartTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ChartType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ChartType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
