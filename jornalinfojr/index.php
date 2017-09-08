<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

use Lib\Router;

require_once ROOT . DS . 'lib' . DS . 'init.php';

$router = new Router();
echo "Route: " . $router->getRoute() . "</br>";
echo "Controller: " . $router->getController() . "</br>";
echo "Action: " . $router->getAction() . "</br>";
echo "Lang: " . $router->getLanguage() . "</br>";
echo "Method Prefix: " . $router->getMethod_prefix() . "</br>";

