<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Chart */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="chart-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('_menus',['model'=>$model]) ?>    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
