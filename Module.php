<?php

namespace yii2learning\chartbuilder;

/**
 * dashboard module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'yii2learning\chartbuilder\controllers';

    public $defaultRoute = 'chart';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
