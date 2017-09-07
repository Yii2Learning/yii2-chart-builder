<?php

namespace yii2learning\chartbuilder\models;

/**
 * This is the ActiveQuery class for [[Connection]].
 *
 * @see Connection
 */
class ConnectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Connection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Connection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
