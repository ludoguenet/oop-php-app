<?php

namespace App\Controllers\Factory;

use Routes\Router;
use Database\PDOConnection;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use PDO;

class ControllerFactory
{
    private Router $router;
    private PDO $pdoConnection;

    public function __construct(Router $router, PDO $dbHandle)
    {
        $this->router = $router;
        $this->PDO = $dbHandle;
    }

    public function make()
    {
        switch ($this->router->parseRoute()[1] ??'') {

            case '':
            case 'home':
            case 'index.php':
            case 'login':
            case 'results':
            case 'register':
                return new HomeController();
                break;
        
                // HomeController::showLoginForm();
                // break;
        
            case 'logout':
            case 'registerUser':
            case 'loginUser':
            case 'search':
                return new UserController($this->pdoConnection);
                break;
                
                
            // UserController::logout();1
            //     HomeController::showResults();
            //     break;
        
 
            //     HomeController::showRegisterForm();
            //     break;

            //     $user = new UserController($dbHandle);
            //     $user->register();
            //     break;
        
          
            //     $user = new UserController($dbHandle);
            //     $user->login();
            //     break;
        
    
            //     $user = new UserController($dbHandle);
            //     $user->findUser();
            //     break;
        
            // default:
            //     include 'Views/404.php';
            //     break;
        
        }
    }
}