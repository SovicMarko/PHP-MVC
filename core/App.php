<?php
class App {
    function __construct() {
        if (isset($_GET['url'])) {
            $url = explode('/', rtrim($_GET['url'], '/'));

            if (isset($url[0])) { $controllerName = $url[0]; } else { $controllerName = 'home'; }
            if (isset($url[1])) { $actionName     = $url[1]; } else { $actionName = 'index'; }
            if (isset($url[2])) { $parametar      = $url[2]; } else { $parametar = null; }

            $controllerFile = 'controllers/'.$controllerName.'.php';

            if (!file_exists($controllerFile)) { 
                $this->ErrorPage();
            } else { 
                require  $controllerFile;
                $controller = new $controllerName;  
                if (!method_exists($controller, $actionName)) {
                    $this->ErrorPage();
                } else {
                    $controller->{$actionName}($parametar);
                }
            }
        }
    }

        private function ErrorPage()
        {
            require 'controllers/error.php'; 
            $controller = new Err();
            $controller->index();
        }
    }


?>


