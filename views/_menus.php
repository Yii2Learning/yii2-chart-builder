<?php
use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'nav-tabs'], 
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-list"></i>  Charts',
            'url' => ['/chartbuilder/chart/index']
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Datasources ',
            'url' => ['/chartbuilder/datasource/index'],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Connections ',
            'url' => ['/chartbuilder/connection/index'],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Chart Type ',
            'url' => ['/chartbuilder/chart-type/index']
        ],
    ]
]);
?>
<br>
