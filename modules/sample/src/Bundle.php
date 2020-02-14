<?php

namespace modules\sample;

use craft\web\AssetBundle;

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
