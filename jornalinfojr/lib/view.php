<?php


namespace Lib;

/**
 * Description of View
 *
 * @author Matheus
 */
class View {
    protected $data;
    protected $path;
    
    protected static function getDefaultViewPath() {
        $router = App::getRouter();
        if(!$router)
            return false;
        
        $controller_dir = $router->getController();
        $template_name = $router->getMethod_prefix() . $router->getAction() . '.php';

        return VIEW_PATH . DS . $controller_dir . DS . $template_name;
    }
    
    public function __construct($data = array(), $path = null) {
        if(!$path) {
            $path = self::getDefaultViewPath();
        }
        if(!file_exists($path)) {
            throw new \Exception("Template not found: {$path}" . "</br>");
        }
        
        $this->data = $data;
        $this->path = $path;
    }
    
    /**
     * $data is used to print the content in 'view'
     * 
     * @return page content
     */
    public function render() {
        $data = $this->data;
        ob_start();
        include $this->path;
        $content = ob_get_clean();
        
        return $content;
    }

}
