<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Connection */

$this->title = Yii::t('app', 'Create Connection');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Connections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
