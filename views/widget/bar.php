<?php 
use miloschuman\highcharts\Highcharts;
use yii\widgets\Pjax;
use \yii\web\JsExpression;

echo Highcharts::widget([
  'options' => [
    'chart'=>[
      'type'=>'bar'
    ],
    'title' => ['text' => $title],
    'xAxis' => [
      'categories' => $model->getColumnXAxis(),
      'title'=> [
        'text'=> $model->xaxis_label
      ]
    ],
    'tooltip'=> [
      'valueSuffix'=>' millions'
    ],
    'plotOptions'=> [
      'bar' => [
          'dataLabels'=> [
              'enabled'=> true
          ]
      ]
    ],
    'legend'=> [
      'layout'=> 'vertical',
      'align'=> 'right',
      'verticalAlign'=> 'top',
      'x'=> -40,
      'y'=> 80,
      'floating'=> true,
      'borderWidth'=> 1,
      'backgroundColor'=>  '#FFFFFF',
      'shadow'=> true
    ],
    'yAxis' => [
       'min'=>0,
       'title' => [
         'text' => $model->yaxis_label,
       ],
       'labels'=>[
        'overflow'=> 'justify'
       ]
    ],
    'series' =>$model->getColumeSeries()
 ]
]);
?>
