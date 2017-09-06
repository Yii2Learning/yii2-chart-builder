<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\ChartType */

$this->title = Yii::t('app', 'Create Chart Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chart Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
