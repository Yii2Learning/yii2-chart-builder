<?php

use yii\db\Schema;
use yii\db\Migration;

class m170907_093428_cb_connection extends Migration
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
            '{{%cb_connection}}',
            [
                'id'=> $this->char(36)->notNull(),
                'connection_name'=> $this->string(255)->null()->defaultValue(null),
                'host'=> $this->string(30)->null()->defaultValue(null),
                'port'=> $this->string(10)->null()->defaultValue(null),
                'username'=> $this->string(150)->null()->defaultValue(null),
                'password'=> $this->string(150)->null()->defaultValue(null),
                'created_at'=> $this->datetime()->null()->defaultValue(null),
                'updated_at'=> $this->datetime()->null()->defaultValue(null),
                'created_by'=> $this->integer(11)->null()->defaultValue(null),
                'updated_by'=> $this->integer(11)->null()->defaultValue(null),
                'driver'=> $this->string(150)->null()->defaultValue(null),
                'database'=> $this->string(150)->null()->defaultValue(null),
                'charset'=> $this->string(150)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->addPrimaryKey('pk_on_cb_connection','{{%cb_connection}}',['id']);

    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_cb_connection','{{%cb_connection}}');
        $this->dropTable('{{%cb_connection}}');
    }
}
