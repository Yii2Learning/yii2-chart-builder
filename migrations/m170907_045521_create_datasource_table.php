<?php

use yii\db\Migration;

/**
 * Handles the creation of table `datasource`.
 */
class m170907_045521_create_datasource_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cb_datasource', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('datasource');
    }
}
