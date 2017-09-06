<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Datasource */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Datasource',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datasources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="datasource-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
