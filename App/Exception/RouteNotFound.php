<?php 

namespace App\Exception; 

class RouteNotFound extends \RuntimeException
{ 
    private string $route; 

    public function __construct(string $route)
    { 
        parent::__construct(); 

        $this->route = $route; 
    }

    public function getRoute(): string 
    { 
        return $this->route;    
    }
}

