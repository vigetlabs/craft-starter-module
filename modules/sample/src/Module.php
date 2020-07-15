<?php

namespace modules\sample;

use Craft;
use yii\base\Event;
use craft\web\twig\variables\CraftVariable;

use modules\sample\services\Sample;
use modules\sample\twigextensions\Extension;

class Module extends \viget\base\Module
{
    public static $instance;

    /**
     * Initializes the module.
     *
     * @return void
     */
    public function init()
    {
        // Initialize all the viget base code
        parent::init();

        // Store a static reference of this class
        self::$instance = $this;

        // Set alias to this module
        Craft::setAlias('@modules/sample', __DIR__);

        // Update controller namspace
        $this->controllerNamespace = 'modules\sample\controllers';

        // Set components on the module
        $this->_setComponents();

        // If this is a front-end request
        if (Craft::$app->request->getIsSiteRequest()) {
            // Bind front-end events
            $this->_bindEvents();

            // Register twig extension
            Craft::$app->view->registerTwigExtension(new Extension());
        }
    }

     /**
     * Set components (services) on the module
     *
     * @return void
     */
    private function _setComponents()
    {
        $this->setComponents([
            'sample' => Sample::class,
        ]);
    }

    /**
     * Bind front-end events
     *
     * @return void
     */
    private function _bindEvents()
    {
        // Now you can access the components and methods in twig with craft.sampleUtil
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function(Event $e) {
                $variable = $e->sender;
                $variable->set('sampleUtil', self::$instance);
            }
        );
    }
}
