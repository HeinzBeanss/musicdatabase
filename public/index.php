<?php

const BASE_PATH = __DIR__.'/../app/';

require BASE_PATH . 'Router.php';
require BASE_PATH . 'functions/helperFunctions.php';

$router = new Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// dd("test");
$router->route($method, $uri);


