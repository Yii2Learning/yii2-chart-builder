<?php

namespace yii2learning\chartbuilder\models;

/**
 * This is the ActiveQuery class for [[Datasource]].
 *
 * @see Datasource
 */
class DatasourceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Datasource[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Datasource|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
