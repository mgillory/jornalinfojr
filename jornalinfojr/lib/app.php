<?php

namespace Lib;

use Lib\Router;
use Lib\View;

/**
 * Description of App
 *
 * @author Matheus
 */
class App {
    /**
     *
     * @var Router
     */
    protected static $router;
    
    static function getRouter() {
        return self::$router;
    }

    public static function run() {
       self::$router = new Router();
       Lang::load(self::$router->getLanguage());
       
       // String manipulation to get the desired controller paths
       $controller_class = 'Controller\\' . ucfirst(self::$router->getController()) . 'Controller';
       $controller_method = strtolower(self::$router->getMethod_prefix() . self::$router->getAction());
       
       // Instantiate a controller object and calls the specified controller method 
       $controller = new $controller_class();
       if(method_exists($controller, $controller_method)) {
           $view_path = $controller->$controller_method();
           $view_object = new View($controller->getData(), $view_path);
           
           // HTML data of the given view, later used by layout (ex: index | view)
           $content = $view_object->render();
       } else {
           throw new \Exception("Method {$controller_method} of class {$controller_class} does not exist!" . "</br>");
       }
       
       $layout = self::$router->getRoute();
       $layout_path = VIEW_PATH . DS . $layout . '.php';
       $layout_view_object = new View(compact('content'), $layout_path);
       // Where the magic happens :) (ex: default | admin_)
       echo $layout_view_object->render();
    }
}
