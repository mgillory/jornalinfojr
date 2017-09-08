<?php

namespace Controller;

use Lib\Controller;

/**
 * Description of PageController
 *
 * @author Matheus
 */
class PageController extends Controller {
    
    // Default method
    public function index() {
        $this->data['teste'] = 'Page list here';
    }
    
    // View specific page
    public function view() {
        $page_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if($page_id != FALSE) {
            $this->data['conteudo'] = "Show page of id: {$page_id}";
        }
    }
    
}
