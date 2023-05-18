<?php

session_start();

define('APPLICATION_PATH', __DIR__); 

spl_autoload_register(function(string $className) { 
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php'; 
}); 

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../doceasy1/routes.php';

try{ 
    (new App\Router\Router($routes))->callAction($route);
}catch (\App\Exception\RouteNotFound $exception){ 
    (new App\Classes\Controllers\ErrorController())->notFoundAction($exception);    
}


