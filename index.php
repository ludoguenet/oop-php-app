<?php

require 'vendor/autoload.php';

use Routes\Router;
use Database\PDOConnection;
use App\Controllers\HomeController;
use App\Controllers\UserController;

session_start();

$dbHandle = PDOConnection::getPDO();

$router = new Router($_SERVER['REQUEST_URI']);

var_dump($router->parseRoute());

switch ($route[1]??'') {

    case '':
    case 'home':
    case 'index.php':
       HomeController::show();
        break;

    case 'login':
        HomeController::showLoginForm();
        break;

    case 'logout':
        UserController::logout();
        break;

    case 'results':
        HomeController::showResults();
        break;

    case 'register':
        HomeController::showRegisterForm();
        break;

    case 'registerUser':
        $user = new UserController($dbHandle);
        $user->register();
        break;

    case 'loginUser':
        $user = new UserController($dbHandle);
        $user->login();
        break;

 case 'search':
        $user = new UserController($dbHandle);
        $user->findUser();
        break;

    default:
        include 'Views/404.php';
        break;

}
