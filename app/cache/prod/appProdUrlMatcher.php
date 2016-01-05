<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // downl_img_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'downl_img_homepage');
            }

            return array (  '_controller' => 'DownlImgBundle\\Controller\\DefaultController::indexAction',  '_route' => 'downl_img_homepage',);
        }

        // ajaxtxt
        if ($pathinfo === '/ajaxtxt') {
            return array (  '_controller' => 'DownlImgBundle\\Controller\\DefaultController::ajaxtxtAction',  '_route' => 'ajaxtxt',);
        }

        // inputtxt_html_twig
        if ($pathinfo === '/inputtxt_html_twig') {
            return array (  '_controller' => 'DownlImgBundle\\Controller\\DefaultController::inputtxtAction',  '_route' => 'inputtxt_html_twig',);
        }

        // uploadtxt_php
        if ($pathinfo === '/uploadtxt_php') {
            return array (  '_controller' => 'DownlImgBundle\\Controller\\DefaultController::uploadtxtAction',  '_route' => 'uploadtxt_php',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
