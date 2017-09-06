<?php
use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'nav-tabs'], 
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-list"></i>  Chart',
            'url' => ['/chartbuilder/chart/index']
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Chart Type ',
            'url' => ['/chartbuilder/chart-type/index']
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> Datasource ',
            'url' => ['/chartbuilder/datasource/index'],
        ],
    ],
]);
?>
<br>
