<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('VIEW_PATH', ROOT . DS . 'view');

use Lib\App;

require_once ROOT . DS . 'lib' . DS . 'init.php';

try {
    App::run();    
} catch (Exception $ex) {
    echo "Unexpected error: {$ex->getMessage()}" . "</br>";
}

