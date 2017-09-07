<?php 
use miloschuman\highcharts\Highcharts;
use \yii\web\JsExpression;
use yii\widgets\Pjax;

echo Highcharts::widget([
  'options' => [
    'title' => ['text' => $model->title],
    'subtitle'=> [
      'text' => $model->sub_title
    ],
    'xAxis' => [
      'categories' => $model->getColumnXAxis(),
      'title'=> [
        'text'=> $model->xaxis_label,
      ]
    ],
    'tooltip'=> [
      'valueSuffix'=>' millions'
    ],
    'plotOptions'=> [
        'column'=> [
            'pointPadding'=> 0.2,
            'borderWidth'=> 0
        ]
    ],
    // 'legend'=> [
    //   'layout'=> 'vertical',
    //   'align'=> 'right',
    //   'verticalAlign'=> 'top',
    //   'x'=> -40,
    //   'y'=> 80,
    //   'floating'=> true,
    //   'borderWidth'=> 1,
    //   'backgroundColor'=>  '#FFFFFF',
    //   'shadow'=> true
    // ],
    'yAxis' => [
       'min'=>0,
       'title' => [
         'text' => $model->yaxis_label,
         'align'=>'high'
       ],
       'labels'=>[
        'overflow'=> 'justify'
       ]
    ],
    'series' =>$model->getColumeSeries()
 ]
]);
?>
