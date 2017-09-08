<?php

namespace Lib;

/**
 * Description of Router
 *
 * @author Matheus
 */
class Router {
    protected $controller;
    protected $action;
    protected $route;
    protected $method_prefix;
    protected $language;
    
    function getController() {
        return $this->controller;
    }

    function getAction() {
        return $this->action;
    }

    function getRoute() {
        return $this->route;
    }

    function getMethod_prefix() {
        return $this->method_prefix;
    }

    function getLanguage() {
        return $this->language;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function setAction($action) {
        $this->action = $action;
    }

    function setRoute($route) {
        $this->route = $route;
    }

    function setMethod_prefix($method_prefix) {
        $this->method_prefix = $method_prefix;
    }

    function setLanguage($language) {
        $this->language = $language;
    }
    
    function __construct() {
        // load defaults
        
        $routes = Config::get('routes');
        
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : ''; 
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->language = Config::get('default_language');
        
        // Handle $_GET['route']
        $route_get = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);
        if($route_get != FALSE && isset($routes[$route_get])) {
            $this->route = $route_get;
            $this->method_prefix = $routes[$route_get];
        }
        
        // Handle $_GET['module'] which is the controller
        $module_get = filter_input(INPUT_GET, 'module', FILTER_SANITIZE_STRING);
        if($module_get != FALSE) {
            $this->controller = strtolower($module_get);
        }
        
        // Handle $_GET['action']
        $action_get = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if($action_get != FALSE) {
            $this->action = strtolower($action_get);
        }
        
        // Handle $_GET['lang']
        $lang_get = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
        if($lang_get != FALSE && in_array($lang_get, Config::get('languages'))) {
            $this->language = $lang_get;
        }
    }
}
