<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Chart */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-view">

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
            'id',
            'name',
            'detail:ntext',
            'chart_type',
            'datasource_id',
            'datasource_type',
            'tag_name',
            'display_type',
            'result_id',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'hospcode',
            'query:ntext',
            'result',
            'target_value',
            'condition:ntext',
            'options:ntext',
            'xaxis',
            'xaxis_label',
            'series',
            'stacked',
            'yaxis_label',
            'title',
            'sub_title',
            'latest_data:ntext',
            'is_kpi',
            'params:ntext',
        ],
    ]) ?>

</div>
