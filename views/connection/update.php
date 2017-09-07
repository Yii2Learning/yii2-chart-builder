<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Connection */

$this->title = $model->connection_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Connections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->connection_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="connection-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
