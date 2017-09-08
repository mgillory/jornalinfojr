# jornalinfojr
A web-based application using php and bootstrap
## Features of this version (v2)
This version has already began to craft the Controller and View parts of MVC :metal:. It also has a basic multiple language support system.

The following files were added:
- **controller/pagecontroller.php**: Control modes *index* and *view* of pages.
- **lang/en.php**: English translation.
- **lang/pt_br.php**: Brazilian Portuguese translation.
- **lib/app.php**: Responsible for running the application as a whole. Worth mentioning the *function run()*, which as the name suggests, runs the entire application.
```php
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
```
- **lib/controller.php**: Default *controller* container.
- **lib/lang.php**: Simple *load* and *get* language class.
- **lib/view.php**: Default *view* container. Worth mentioning the *function render()*, which uses the concept of [output buffering](https://stackoverflow.com/questions/2832010/what-is-output-buffering) to render the HTML.
```php
    public function render() {
        $data = $this->data;
        ob_start();
        include $this->path;
        $content = ob_get_clean();
        
        return $content;
    }
```
- **view/default.php**: Default HTML structure.
- **view/page/index.php**: Page *index* content.
- **view/page/view.php**: Page *view* content.
## Overview of the application's basic data flow
- index.php
  - app.php:run()
    - router.php
      - *some*controller.php
         - *some*view.php
