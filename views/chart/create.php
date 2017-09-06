<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Chart */

$this->title = Yii::t('app', 'Create Chart');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="panel panel-default">
    <div class="chart-create panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>