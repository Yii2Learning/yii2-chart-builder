<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Connection */
use yii2learning\chartbuilder\models\Connection;

$this->title = $model->connection_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Connections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connection-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'connection_name',
            'host',
            'port',
            'username',
            'password',
            'created_at:dateTime',
        ],
    ]) ?>

</div>
