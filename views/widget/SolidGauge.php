<?php 
use miloschuman\highcharts\Highcharts;
use yii\widgets\Pjax;
use \yii\web\JsExpression;
use yii\helpers\VarDumper;
$this->registerJsFile('https://code.highcharts.com/highcharts-more.js', [
  'depends' => 'miloschuman\highcharts\HighchartsAsset'
]);
$this->registerJsFile('https://code.highcharts.com/modules/solid-gauge.js', [
  'depends' => 'miloschuman\highcharts\HighchartsAsset'
]);
// print_r($model);
$userOptions = $model->getOptions();
$options = array_merge([
  'credits' => ['enabled' => false],
  'title' => ['text' => $model->title],
  'subtitle'=> [
    'text' => $model->sub_title
  ],
  'chart'=>[
    'spacingBottom'=>-170,
    'type' => 'gauge',
    'plotBackgroundColor' => null,
    'plotBackgroundImage' => null,
    'plotBorderWidth' => 0,
    'plotShadow' => false,
    'height'=> 300,
  ],
  'pane'=> [
    'startAngle'=> -90,
    'endAngle'=> 90,
    'size'=> 400,
    'background' =>[
        'backgroundColor' =>  '#f5f5f5',
        'shape' => 'arc'
    ]
  ],
  'plotOptions'=> [
    'gauge'=> [
        'dataLabels'=> [
            'enabled'=> false
        ],
        'dial'=> [
            'baseLength'=> '0%',
            'baseWidth'=> 10,
            'radius'=> '100%',
            'rearLength'=> '0%',
            'topWidth'=> 1
        ]
    ]
],

  'yAxis' => [
      'minorTickInterval'=> 'auto',
      'minorTickPosition'=>'inside',
      'tickPosition'=> 'inside',
      'lineWidth' => 0,
      'min' => 0,
      'max' => 100,
      'plotBands'=> [[
          'from'=> 0,
          'to'=> 30,
          'color'=> 'rgb(155, 187, 89)', // green
          'thickness'=> '3%'
        ], [
          'from'=> 30,
          'to'=> 100,
          'color'=> 'rgb(192, 0, 0)', // red
          'thickness'=> '3%'
      ]]  
  ],
  'series' => [
    [
      'name'=>'ค่า',
      'data'=> $model->getSolidGaugeSeries()
    ]
  ]
],$userOptions);
// VarDumper::dump($options,10,true);
?>

<?= Highcharts::widget([
  'options' =>$options
]);
?>
<p class="text-center">ผลงาน: <?= $model->getSolidGaugeSeries()[0]?></p>

