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
    public $controllerNamespace = 'dmitxe\yii2\wiki\controllers';

    /**
     * @var string the AccessControl for CRUD. Set to False for access control quests
     */
    public $editorRole = 'administrator';

    /**
     * @var string the layout for CRUD actions.
     */
    public $editorLayout = '//main';

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
