<?php

namespace modules\sample;

use Craft;
use modules\sample\twigextensions\Extension;

/**
 * Yii Module for setting up custom Twig functionality to keep templates streamlined
 */
class Module extends \yii\base\Module
{
    public static $instance;

    /**
     * Initializes the module.
     *
     * @return void
     */
    public function init()
    {
        Craft::setAlias('@modules/sample', $this->getBasePath());
        $this->controllerNamespace = 'modules\sample\controllers';

        parent::init();
        self::$instance = $this;

        if (Craft::$app->request->getIsSiteRequest()) {
            Craft::$app->view->registerTwigExtension(new Extension());
        }

        Craft::info(
            'Sample module loaded',
            __METHOD__
        );
    }
}
