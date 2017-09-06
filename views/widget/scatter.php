<?php 
use miloschuman\highcharts\Highcharts;
use \yii\web\JsExpression;
use yii\widgets\Pjax;
?>
<?= Highcharts::widget([
    'options' => [
        'chart' => [
          'type' => 'scatter',
          'zoomType'=> 'xy'
        ],
        'title' => ['text' => $title],
        'subtitle'=> [
          'text' => null
        ],
        'tooltip' => [
            'headerFormat' => '<span style="">{series.name}</span><br>',
            'pointFormat' => '<span style="color:{point.color}">{point.name}</span><br>ร้อยละ: <b>{point.percentage:.1f}%</b><br/>'
        ],
        'plotOptions' => [
            'pie' => [
                'allowPointSelect' => true,
                'cursor' => 'pointer',
            ],
        ],
        'legend' => [
          'layout'=> 'vertical',
          'align'=> 'left',
          'verticalAlign'=> 'top',
          'x'=> 100,
          'y'=> 70,
          'floating'=> true,
          'backgroundColor'=> new JsExpression("(Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'"),
          'borderWidth'=> 1
        ],
        'yAxis' => [
          'title' => [
            'text' => $model->yaxis_label,
          ],
       ],
       'xAxis' => [
        'title'=> [
          'text'=> $model->xaxis_label,
        ]
      ],
        'series' => $model->getColumeSeries()
    ],
]);
?>