<?php

use yii\db\Schema;
use yii\db\Migration;

class m170907_101344_cb_chart_typeDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%cb_chart_type}}',
                           ["code", "name", "image", "options", "sort", "widget_classname"],
                            [
    [
        'code' => 'Area',
        'name' => 'Area',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'Bar',
        'name' => 'Bar',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'Column',
        'name' => 'Column',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'Line',
        'name' => 'Line',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'Pie',
        'name' => 'Pie',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'Scatter',
        'name' => 'Scatter',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
    [
        'code' => 'SolidGauge',
        'name' => 'Solid Gauge',
        'image' => null,
        'options' => null,
        'sort' => null,
        'widget_classname' => 'miloschuman\\highcharts\\Highcharts',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%cb_chart_type}} CASCADE');
    }
}
