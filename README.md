# jornalinfojr
A web-based application using php and bootstrap
## Features of this version (v1-router)
The folder structure is divided according to **MVC design pattern**, as explained by Gui (@guilherme-gm). This initial version consists of 5 files:
- **config/config.php**: Sets all the default configuration of the web application, such as title, language supported, routes, among others.
- **lib/config.php**: It's the class that actually implements the logic to create the array specified by **config/config.php**.
- **lib/init.php**: The middleman used by **index.php** to initialize all the *'.php'* files.  
- **lib/router.php**: The core idea behind this initial version. This class handles the URL as seen below:
```php
    function __construct() {
        // load defaults
        
        $routes = Config::get('routes');
        
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : ''; 
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->language = Config::get('default_language');
        
        // Handles $_GET['route']
        $route_get = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);
        if($route_get != FALSE && isset($routes[$route_get])) {
            $this->route = $route_get;
            $this->method_prefix = $routes[$route_get];
        }
        
        // Handles $_GET['module'] which is the controller
        $module_get = filter_input(INPUT_GET, 'module', FILTER_SANITIZE_STRING);
        if($module_get != FALSE) {
            $this->controller = strtolower($module_get);
        }
        
        // Handles $_GET['action']
        $action_get = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if($action_get != FALSE) {
            $this->action = strtolower($action_get);
        }
        
        // Handles $_GET['lang']
        $lang_get = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
        if($lang_get != FALSE && in_array($lang_get, Config::get('languages'))) {
            $this->language = $lang_get;
        }
    }
```
- **index.php**: The first file that the browser opens up. It just contains a few definitions and instantializes a *Router* object in order to perform a visual check that everything is ok.
