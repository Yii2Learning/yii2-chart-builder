<?php

use yii\db\Schema;
use yii\db\Migration;

class m170907_093458_cb_chart extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%cb_chart}}',[
            'id'=> $this->char(36)->notNull(),
            'name'=> $this->string(255)->null()->defaultValue(null),
            'detail'=> $this->text()->null()->defaultValue(null),
            'chart_type'=> $this->string(100)->null()->defaultValue(null),
            'datasource_id'=> $this->char(36)->null()->defaultValue(null),
            'datasource_type'=> "enum('query', 'datasource') NULL DEFAULT 'query'",
            'tag_name'=> $this->string(255)->notNull(),
            'display_type'=> "enum('table', 'chart') NULL DEFAULT 'chart'",
            'result_id'=> $this->char(36)->null()->defaultValue('realtime'),
            'created_at'=> $this->datetime()->null()->defaultValue(null),
            'updated_at'=> $this->datetime()->null()->defaultValue(null),
            'created_by'=> $this->integer(11)->null()->defaultValue(null),
            'updated_by'=> $this->integer(11)->null()->defaultValue(null),
            'query'=> $this->text()->null()->defaultValue(null),
            'result'=> $this->float(11, 2)->null()->defaultValue(null),
            'target_value'=> $this->float(11, 2)->null()->defaultValue(null),
            'condition'=> $this->text()->null()->defaultValue(null),
            'options'=> $this->text()->null()->defaultValue(null),
            'xaxis'=> $this->string(100)->null()->defaultValue(null),
            'xaxis_label'=> $this->string(255)->null()->defaultValue(null),
            'series'=> $this->string(100)->null()->defaultValue(null),
            'stacked'=> $this->smallInteger(1)->null()->defaultValue(0),
            'yaxis_label'=> $this->string(255)->null()->defaultValue(null),
            'title'=> $this->string(255)->null()->defaultValue(null),
            'sub_title'=> $this->string(255)->null()->defaultValue(null),
            'params'=> $this->text()->null()->defaultValue(null),
            'latest_data'=> $this->text()->null()->defaultValue(null),
            'connection_id'=> $this->char(36)->null()->defaultValue(null),
        ], $tableOptions);

        $this->createIndex('tag_name','{{%cb_chart}}',['tag_name'],true);
        $this->createIndex('chart_type','{{%cb_chart}}',['chart_type'],false);
        $this->addPrimaryKey('pk_on_cb_chart','{{%cb_chart}}',['id']);
        $this->addForeignKey(
            'fk_cb_chart_chart_type',
            '{{%cb_chart}}', 'chart_type',
            '{{%cb_chart_type}}', 'code',
            'SET NULL', 'CASCADE'
        );
    }

    public function safeDown()
    {
            $this->dropForeignKey('fk_cb_chart_chart_type', '{{%cb_chart}}');
            $this->dropPrimaryKey('pk_on_cb_chart','{{%cb_chart}}');
            $this->dropTable('{{%cb_chart}}');
    }
}
