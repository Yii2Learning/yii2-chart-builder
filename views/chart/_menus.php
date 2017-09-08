<?php
use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-list"></i>  Detail',
            'url' => ['/chartbuilder/chart/update','id'=>$model->id]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Datasource ',
            'url' => ['/chartbuilder/chart/datasource','id'=>$model->id],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-signal"></i> Preview',
            'url' => ['/chartbuilder/chart/preview','id'=>$model->id],
        ],
    ],
    'options' => ['class' => 'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
<br>
