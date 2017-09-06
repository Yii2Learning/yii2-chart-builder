<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yii2learning\chartbuilder\models\Datasource */

$this->title = Yii::t('app', 'Create Datasource');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datasources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datasource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
