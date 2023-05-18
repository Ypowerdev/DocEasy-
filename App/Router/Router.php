<?php 

namespace App\Router; 

use App\Exception\RouteNotFound; 
use App\Classes\Controllers\PostExtractor; 
use App\Classes\Controllers\PostableInterface; 

class Router 
{
    private $routes;
    
    public function __construct(array $routes)
    { 
        $this->routes = $routes; 
    }

    public function callAction ($route): void 
    { 

        $isRouteFound = false;
        foreach ($this->routes as $pattern => $controllerAndAction) {
            preg_match($pattern, $route, $matches);
            if (!empty($matches)) {
                $isRouteFound = true;
                    break;
            }
    }

    if (!$isRouteFound) {
        throw new RouteNotFound($route); 
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction['class'];
    $actionName = $controllerAndAction['method'];
    $avaiableMethods = $controllerAndAction['avaiableMethods']; 
    $controller = new $controllerName(); 
           
    if ($controller instanceof PostableInterface){ 
        $controller->setPostParams($_POST);       
    }  
        $controller->$actionName(...$matches);  
    }
}  
 
    
    
    

