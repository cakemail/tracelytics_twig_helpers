<?php

namespace Component\Twig;

use Twig_Extension;
use Twig_Function_Function;
use Twig_Environment;
use CakeFramework\Router;
use CakeFramework\Locale;

class RUM extends Twig_Extension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'oboe_get_rum_header' => new Twig_Function_Function(__CLASS__.'::createRumHeader'),
            'oboe_get_rum_footer' => new Twig_Function_Function(__CLASS__.'::createRumFooter'),
        );
    }

    public static function createHeader()
    {
        return '...';
    }

    public static function createFooter()
    {
        return '...';
    }

    public function getName()
    {
        return 'tracelytics_rum';
    }
}