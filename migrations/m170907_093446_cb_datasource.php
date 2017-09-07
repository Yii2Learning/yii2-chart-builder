<?php

use yii\db\Schema;
use yii\db\Migration;

class m170907_093446_cb_datasource extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%cb_datasource}}',
            [
                'id'=> $this->char(36)->notNull(),
                'name'=> $this->string(255)->null()->defaultValue(null),
                'query'=> $this->text()->null()->defaultValue(null),
                'connection_id'=> $this->char(36)->null()->defaultValue(null),
                'params'=> $this->text()->null()->defaultValue(null),
                'filter'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->datetime()->null()->defaultValue(null),
                'updated_at'=> $this->datetime()->null()->defaultValue(null),
                'created_by'=> $this->integer(11)->null()->defaultValue(null),
                'updated_by'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->addPrimaryKey('pk_on_cb_datasource','{{%cb_datasource}}',['id']);

    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_cb_datasource','{{%cb_datasource}}');
        $this->dropTable('{{%cb_datasource}}');
    }
}
