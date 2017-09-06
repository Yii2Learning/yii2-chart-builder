<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\ChartType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Chart Type',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chart Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="chart-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
