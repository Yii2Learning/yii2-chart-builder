<?php

use yii\db\Schema;
use yii\db\Migration;

class m170907_093320_cb_chart_type extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%cb_chart_type}}',[
            'code'=> $this->string(100)->notNull(),
            'name'=> $this->string(255)->null()->defaultValue(null),
            'image'=> $this->string(255)->null()->defaultValue(null),
            'options'=> $this->text()->null()->defaultValue(null),
            'widget_classname'=> $this->string(255)->null()->defaultValue(null),
            'sort'=> $this->integer(11)->null()->defaultValue(null),
        ], $tableOptions);

        $this->addPrimaryKey('pk_on_cb_chart_type','{{%cb_chart_type}}',['code']);
    }

    public function safeDown()
    {
            $this->dropPrimaryKey('pk_on_cb_chart_type','{{%cb_chart_type}}');
            $this->dropTable('{{%cb_chart_type}}');
    }
}
