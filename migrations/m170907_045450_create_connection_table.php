<?php

use yii\db\Migration;

/**
 * Handles the creation of table `connection`.
 */
class m170907_045450_create_connection_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cb_connection', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('connection');
    }
}
