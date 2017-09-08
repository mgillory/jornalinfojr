<?php

spl_autoload_extensions('.php');
spl_autoload_register();

require_once ROOT . DS . 'config' . DS . 'config.php';

// Used for translation, to get a clear code in html
function __($key, $default = '') {
    return \Lib\Lang::get($key, $default);
}