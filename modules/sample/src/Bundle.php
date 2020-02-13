<?php

namespace modules\sample;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class Bundle extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@modules/sample/resources';

        $this->css = [
            'style.css',
        ];

        parent::init();
    }
}
