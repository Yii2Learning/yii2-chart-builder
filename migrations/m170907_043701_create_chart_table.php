<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chart`.
 */
class m170907_043701_create_chart_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cb_chart', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('chart');
    }
}
