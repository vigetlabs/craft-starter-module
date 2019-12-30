<?php

namespace modules\sample;

use Craft;
use yii\base\Event;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;

use modules\sample\twigextensions\Extension;
use modules\sample\services\CpNav;

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

        $this->_setComponents();

        if (Craft::$app->request->getIsSiteRequest()) {
            Craft::$app->view->registerTwigExtension(new Extension());
        }

        if (Craft::$app->request->getIsCpRequest()) {
            $this->_bindCpEvents();
        }

        Craft::info(
            'Sample module loaded',
            __METHOD__
        );
    }

    /**
     * Set components (services) on the module
     *
     * @return void
     */
    private function _setComponents()
    {
        $this->setComponents([
            'cpNav' => CpNav::class,
        ]);
    }

    /**
     * Bind actions onto Craft CP events
     *
     * @return void
     */
    private function _bindCpEvents()
    {
        // If it's not devMode, don't modify nav
        if (!Craft::$app->config->general->devMode) {
            return;
        }

        Event::on(
            Cp::class,
            Cp::EVENT_REGISTER_CP_NAV_ITEMS,
            function(RegisterCpNavItemsEvent $event) {
                $event->navItems = $this->cpNav->addItems($event->navItems);
            }
        );
    }
}
