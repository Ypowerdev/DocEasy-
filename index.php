<?php

session_start();

define('APPLICATION_PATH', __DIR__); 

include 'vendor/autoload.php';

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../doceasy.ru/routes.php';

try{ 
  (new App\Router\Router($routes))->callAction($route);
}catch (\App\Exception\RouteNotFound $exception){ 
  echo 'Страница c роутом ' . $exception->getRoute() . ' не найдена'; 
  http_response_code(404); 
}


