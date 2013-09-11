<?php

namespace TracelyticsTwigHelpers;

use Twig_Extension;
use Twig_Function_Function;


/**
 * Add functions to Twig to be able to include the Tracelytics Real User Monitoring
 * @see https://support.tv.appneta.com/support/solutions/articles/86401-php-rum-instrumentation
 */
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
            'oboe_get_rum_header' => new Twig_Function_Function(__CLASS__.'::createHeader'),
            'oboe_get_rum_footer' => new Twig_Function_Function(__CLASS__.'::createFooter'),
        );
    }

    public static function createHeader($useScriptTags = true)
    {
        if (extension_loaded('oboe')) {
            return oboe_get_rum_header($useScriptTags);
        }
        return '';
    }

    public static function createFooter($useScriptTags = true)
    {
        if (extension_loaded('oboe')) {
            return oboe_get_rum_footer($useScriptTags);
        }
        return '';
    }

    public function getName()
    {
        return 'tracelytics_rum';
    }
}