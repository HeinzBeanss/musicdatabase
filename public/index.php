<?php

// Errors - To remove for production
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Core\Session;
use Core\Router;

session_start();

// Don't change this, as it's used within my application.
const BASE_PATH = __DIR__.'/../app/';

require BASE_PATH . '../vendor/autoload.php';
require BASE_PATH . 'Core/functions.php';

// // Keep this for future reference.
// spl_autoload_register(function ($class) {
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

//     require base_path("{$class}.php");
// });

$router = new Router();

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($method, $uri);

Session::unflash();


