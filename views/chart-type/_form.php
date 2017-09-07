<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\ChartType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chart-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6">    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
    </div>
    <?= $form->field($model, 'widget_classname')->textInput(['maxlength' => true]) ?>
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

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
