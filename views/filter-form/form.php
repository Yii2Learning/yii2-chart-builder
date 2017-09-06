<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;;

?>
 <?php Pjax::begin(['id'=>'formsearch-chart-pjax']); ?>
 
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'options' => ['data-pjax' => true ],
            'type' => ActiveForm::TYPE_INLINE
        ]); ?>

        <?= $form->field($model, 'dateRange', [
            'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DateRangePicker::classname(), [
            'useWithAddon'=>true,
            'convertFormat'=>true,
            'startAttribute'=>'startDate',
            'endAttribute'=>'endDate',
            'pluginEvents'=>[
                "apply.daterangepicker" => "function() { $('#stat-search-form').submit(); }",
            ],
            'pluginOptions'=>[
                'locale'=>[
                    'format'=>'Y-m-d',
                    'cancelLabel'=>'Clear'
                ],
                'presetDropdown'=>true,
                "opens"=> "right",
                'ranges'=> new JsExpression("{
                    'ล่าสุด 7 วัน': [moment().subtract(6, 'days'), moment()],
                    'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
                    'เดือนที่ผ่านมา': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }")
            ]
        ]);?>
    <?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>

<?php
$Js = <<<JS
  $("#formsearch-stat-pjax").on("pjax:end", function() {
    $.pjax.reload({container:"$pjaxId"});
  });
JS;
$this->registerJs($Js);
 ?>

