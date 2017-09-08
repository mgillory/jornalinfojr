<?php

namespace Lib;

/**
 * Description of Lang
 *
 * @author Matheus
 */
class Lang {
    protected static $data;
    
    public static function load($lang_code) {
        $lang_path = ROOT . DS . 'lang' . DS . strtolower($lang_code) . '.php';
        if(file_exists($lang_path)) {
            self::$data = include $lang_path;
        } else {
            throw new \Exception("Language file not found: {$lang_path}");
        }
    }
    
    public static function get($key, $default = '') {
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default; 
    }
}
