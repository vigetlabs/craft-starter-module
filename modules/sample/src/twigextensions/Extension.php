<?php

namespace modules\sample\twigextensions;

use Craft;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use modules\sample\services\Sample;

/**
 * Custom Twig Extensions
 */
class Extension extends AbstractExtension
{
    /**
     * Register Twig functions
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction(
                'testMethod',
                [Sample::class, 'testMethod']
            ),
        ];
    }
}
