<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel yii2learning\chartbuilder\models\DatasourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datasources');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datasource-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('/_menus') ?>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Datasource'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            'updated_by:dateTime',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:150px;'],
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{view} {update} {delete} </div>',
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
