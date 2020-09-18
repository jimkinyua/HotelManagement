<?php

namespace frontend\modules\shopowner;

/**
 * shopowner module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\shopowner\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout = 'main';
        // custom initialization code goes here
    }
}
