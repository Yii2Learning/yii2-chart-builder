<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chart_type`.
 */
class m170907_045430_create_chart_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cb_chart_type', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('chart_type');
    }
}
