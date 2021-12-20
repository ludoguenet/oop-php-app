<?php

require 'vendor/autoload.php';

use App\Controllers\Factory\ControllerFactory;
use Routes\Router;
use Database\PDOConnection;
use App\Controllers\HomeController;
use App\Controllers\UserController;

session_start();

// BDD Connection
$dbHandle = PDOConnection::getPDO();

// Router
$router = new Router($_SERVER['REQUEST_URI']);
$route = $router->parseRoute();

// ControllerFactory
$controllerFactory = new ControllerFactory($router, $dbHandle);

$controller = $controllerFactory->make();
