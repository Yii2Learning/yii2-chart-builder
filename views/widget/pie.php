<?php 
use miloschuman\highcharts\Highcharts;
use \yii\web\JsExpression;
use yii\widgets\Pjax;
?>
<?= Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'pie'],
        'title' => ['text' => $title],
        'tooltip' => [
            'headerFormat' => '<span style="">{series.name}</span><br>',
            'pointFormat' => '<span style="color:{point.color}">{point.name}</span><br>ร้อยละ: <b>{point.percentage:.1f}%</b><br/>'
        ],
        'plotOptions' => [
            'pie' => [
                'allowPointSelect' => true,
                'cursor' => 'pointer',
            ],
            'series' => [
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '{point.name}<br>ร้อยละ: {point.percentage:.1f}% <br> จำนวน: {point.y}'
                ],
            ],
        ],
        'series' => $model->getPieSeries()
    ],
]);
?>