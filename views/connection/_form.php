<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Connection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="connection-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <div class="row">
    <div class="col-md-6">  <?= $form->field($model, 'connection_name')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6">  
    <?= $form->field($model, 'driver')->widget(Select2::classname(), [
            'data'=>$model->getDriverItems(),
            'options' => [
                'placeholder' => 'Select driver ...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">  <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"> 
    <?= $form->field($model, 'charset')->widget(Select2::classname(), [
            'data'=>$model->getCharacterSet(),
            'options' => [
                'placeholder' => 'Select character set ...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6"> <?= $form->field($model, 'port')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"> <?= $form->field($model, 'database')->textInput(['maxlength' => true]) ?></div>
</div>
<div class="row">
    <div class="col-md-6"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?></div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
