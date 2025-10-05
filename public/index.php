<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
/*
*@var $router myfrm\Router
*/
session_start();


require_once __DIR__ . '/../vendor/autoload.php'; // подключение автозагрузчика композер
require dirname( __DIR__ ) . '/config/config.php'; // подключение путей
require_once __DIR__ .'/bootstrap.php';
require CORE_PATH . '/funcs.php'; // подключение функций

$router = new myfrm\Router();
require CONFIG_PATH . "/routes.php";
$router->match();
//dd($router->routes);
