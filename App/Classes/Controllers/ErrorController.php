<?php 

namespace App\Classes\Controllers; 

use App\Exception\RouteNotFound; 

class ErrorController
{       
    public function notFoundAction(RouteNotFound $exception): void
    { 
        echo 'Страница c адресом ' . '"' . $exception->getRoute() . '"' . ' не найдена'; 
        http_response_code(404);         
    }
}
