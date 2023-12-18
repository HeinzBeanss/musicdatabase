<?php

// Errors - To remove for production
error_reporting(E_ALL);
ini_set('display_errors', 1);

const BASE_PATH = __DIR__.'/../app/';
require BASE_PATH . 'functions/helperFunctions.php';
require base_path('Router.php');

$router = new Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($method, $uri);


