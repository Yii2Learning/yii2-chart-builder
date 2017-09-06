<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Chart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chart-form">

<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model) ?>

    <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true]) ?>
            </div>
       </div>

    <?=$form->field($model, 'detail')->widget(\vova07\imperavi\Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen'
                ]
            ]
        ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
