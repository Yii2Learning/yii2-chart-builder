<?php 
use miloschuman\highcharts\Highcharts;
use yii\widgets\Pjax;
use \yii\web\JsExpression;
$this->registerJsFile('https://code.highcharts.com/highcharts-more.js', [
  'depends' => 'miloschuman\highcharts\HighchartsAsset'
]);
$this->registerJsFile('https://code.highcharts.com/modules/solid-gauge.js', [
  'depends' => 'miloschuman\highcharts\HighchartsAsset'
]);

echo Highcharts::widget([
  'options' => [
  'chart'=>[
    'type'=>'area'
  ],
  'title' => ['text' => $model->title],
  'subtitle'=> [
    'text' => $model->sub_title
  ],
  'xAxis'=> [
    'categories' => $model->getColumnXAxis(),
    'title'=> [
      'text'=> $model->xaxis_label
    ],
    'allowDecimals'=>false,
    'labels'=> new JsExpression("{
      formatter: function () {
          return this.value; 
      }
  }")
  ],
  'yAxis' => [
    'title' => [
      'text' => $model->yaxis_label,
    ],
 ],
 'series' =>$model->getColumeSeries()
]
]);
?>
