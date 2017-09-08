<?php

namespace Lib;

/**
 * Description of Controller
 *
 * @author Matheus
 */
class Controller {
    protected $data;
    
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }
    
    function __construct($data = array()) {
        $this->data = $data;
    }
}
