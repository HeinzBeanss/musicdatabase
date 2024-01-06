<?php

// Errors - To remove for production
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Core\Session;
use Core\Router;

session_start();

const BASE_PATH = __DIR__.'/../app/';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

// require base_path('Core/Router.php');
// require base_path('Core/Session.php');


$router = new Router();

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($method, $uri);

Session::unflash();


