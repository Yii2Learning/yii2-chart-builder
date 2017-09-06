<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\ChartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'chart_type') ?>

    <?= $form->field($model, 'datasource_id') ?>

    <?php // echo $form->field($model, 'datasource_type') ?>

    <?php // echo $form->field($model, 'tag_name') ?>

    <?php // echo $form->field($model, 'display_type') ?>

    <?php // echo $form->field($model, 'result_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'query') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'target_value') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'options') ?>

    <?php // echo $form->field($model, 'xaxis') ?>

    <?php // echo $form->field($model, 'xaxis_label') ?>

    <?php // echo $form->field($model, 'series') ?>

    <?php // echo $form->field($model, 'stacked') ?>

    <?php // echo $form->field($model, 'yaxis_label') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'sub_title') ?>

    <?php // echo $form->field($model, 'latest_data') ?>

    <?php // echo $form->field($model, 'is_kpi') ?>

    <?php // echo $form->field($model, 'params') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
