<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel yii2learning\chartbuilder\models\ChartTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chart Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('/_menus') ?>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Chart Type'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'code',
               'options'=>['style'=>'width:200px;']
            ],
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:150px;'],
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{view} {update} {delete} </div>',
             ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
