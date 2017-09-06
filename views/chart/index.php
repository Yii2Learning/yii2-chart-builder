<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel yii2learning\chartbuilder\models\ChartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Charts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('/_menus') ?>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Chart'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute'=>'chart_type',
                'filter'=> \yii2learning\chartbuilder\models\ChartType::find()->select('name')->indexBy('code')->column()
            ],
            // 'datasource_type',
            // 'tag_name',
            // 'display_type',
            // 'result_id',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            // 'hospcode',
            // 'query:ntext',
            // 'result',
            // 'target_value',
            // 'condition:ntext',
            // 'options:ntext',
            // 'xaxis',
            // 'xaxis_label',
            // 'series',
            // 'stacked',
            // 'yaxis_label',
            // 'title',
            // 'sub_title',
            // 'latest_data:ntext',
            // 'is_kpi',
            // 'params:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
