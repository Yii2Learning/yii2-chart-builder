<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use  yii2learning\chartbuilder\ChartBuilder;
use  frontend\modules\dashboard\models\ChartType;
use miloschuman\highcharts\Highcharts;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\modules\dashboard\models\Chart */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Charts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<?= $this->render('_menus',['model'=>$model]) ?>

<div class="panel panel-default panel-body">
<?= ChartBuilder::widget([
            'chartId' => $model->id,
            'model' => $model,
            'title'=>$model->name,
            'filterModel' => $filterModel
        ]); ?>
</div>
<div class="chart-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
            <div class="col-md-3">
                    <?= $form->field($model, 'display_type')->inline()->radioList(['table'=>'Table','chart'=>'Chart']); ?>
            </div>
            <div class="col-md-9">
                    <?= $form->field($model, 'chart_type')->inline()->radioList(ChartType::find()->select('name')->indexBy('code')->column()); ?>
            </div>
       </div>

    <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true]) ?>
            </div>
       </div>

    <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'xaxis_label')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'yaxis_label')->textInput(['maxlength' => true]) ?>
            </div>
       </div>

       <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'xaxis')->widget(Select2::classname(), [
                       'data' => $model->getColumns(),
                        'options' => ['placeholder' => 'เลือก X-Axis ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                ]); ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'series')->widget(Select2::classname(), [
                        'data' => $model->getColumns(),
                        'options' => ['placeholder' => ' เลือก Series...','multiple' => $model->isMultipleSeries()],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                ]); ?>
            </div>
       </div>
       <div class="panel panel-default panel-body">
        <?= $form->field($model, 'options')->widget('trntv\aceeditor\AceEditor',[
                'mode'=>'php',
                'theme'=>'github',
                'containerOptions'=>[
                    'style' => 'width: 100%; min-height: 300px'
                ]
                //'readOnly' => true
            ]) ?>
        </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton( 'Preview', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
    เรียกใช้งาน
    <pre>
        <?=htmlspecialchars('<?=') ?> \yii2learning\chartbuilder\ChartBuilder::widget([
            'chartId' => '<?=$model->id?>',
        ]);<?=htmlspecialchars('?>') ?>
    </pre>
  <div class="panel panel-default panel-body">
  <?php if(!empty($dataProvider)): ?>    
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class'=>'table table-striped']
            ]); 
            ?>
        <?php  endif;?>
  </div>



  





