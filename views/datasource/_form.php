<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Datasource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datasource-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6">    
            <?= $form->field($model, 'connection_id')->widget(kartik\select2\Select2::classname(), [
                    'data' => array_merge(['db'=>'Defalut'],\yii2learning\chartbuilder\models\Connection::find()->select('connection_name')->indexBy('id')->column()),
                    'options' => ['placeholder' => 'Select Connection ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]); ?>
        </div>
    </div>
    <?= $form->field($model, 'params')->widget(kartik\select2\Select2::classname(), [
                        'options' => [
                            'placeholder' => 'เพิ่มตัวแปร ...',
                            'multiple' =>true
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'tags' => true,
                            'tokenSeparators' => [',']
                        ],
                ]); ?>


        <div class="panel panel-default panel-body">
            <?= $form->field($model, 'query')->widget('trntv\aceeditor\AceEditor',[
                    'mode'=>'sql',
                    'theme'=>'github',
                    //'readOnly' => true
                ]) ?>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Run'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="panel panel-default panel-body">
    <?php if(!empty($dataProvider)): 
                try {
                    echo kartik\grid\GridView::widget([
                        'pjax'=>true,
                        'responsive'=>true,
                        'hover'=>true,
                        'dataProvider' => $dataProvider,
                        'bordered'=>false,
                        'striped' =>true
                    ]); 
                } catch(\yii\db\Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            ?>
        <?php   endif;?>
</div>
</div>
