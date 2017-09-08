<?php

use Lib\Config;

/**
 * Sets all the default configuration of the web application
 */

Config::set('site_name', 'Jornal Info');
Config::set('languages', ['pt_br', 'en']);
Config::set('routes', [
   'default'    => '',
    'admin'     => 'admin_'
]);

Config::set('default_route', 'default');
Config::set('default_language', 'pt_br');
Config::set('default_controller', 'page');
Config::set('default_action', 'index');
