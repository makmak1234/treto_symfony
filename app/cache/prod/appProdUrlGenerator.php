<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'downl_img_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'DownlImgBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ajaxtxt' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'DownlImgBundle\\Controller\\DefaultController::ajaxtxtAction',  ),  2 =>   array (    'methods' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ajaxtxt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'inputtxt_html_twig' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'DownlImgBundle\\Controller\\DefaultController::inputtxtAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/inputtxt_html_twig',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'uploadtxt_php' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'DownlImgBundle\\Controller\\DefaultController::uploadtxtAction',  ),  2 =>   array (    'methods' => 'POST | GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/uploadtxt_php',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_js_routing_js' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'fos_js_routing.controller:indexAction',    '_format' => 'js',  ),  2 =>   array (    '_format' => 'js|json',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'js|json',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/js/routing',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
