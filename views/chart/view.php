<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use  yii2learning\chartbuilder\ChartBuilder;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Chart */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default panel-body">
<?= ChartBuilder::widget([
            'chartId' => $model->id,
            'model' => $model,
            'title'=>$model->name,
            'filterModel' => $filterModel
        ]); ?>
</div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'detail:html'
        ],
    ]) ?>

</div>
