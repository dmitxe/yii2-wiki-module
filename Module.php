<?php

namespace dmitxe\yii2\wiki;

/**
 * wiki module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\wiki\controllers';

    public $editorRole = 'administrator';

    /**
     * @var string the default route to use when not specified
     */
    public $defaultRoute = 'article/index';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
