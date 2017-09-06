<?php

namespace yii2learning\chartbuilder\models;

/**
 * This is the ActiveQuery class for [[Chart]].
 *
 * @see Chart
 */
class ChartQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Chart[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Chart|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
