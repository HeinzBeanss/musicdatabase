<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
'/' => 'pages/albums.php', 
'/albums' => 'pages/albums.php',
'/artists' => 'pages/artists.php',
'/songs' => 'pages/songs.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
    require "views/$code.php";
    die();
}

routeToController($uri, $routes);


// 1 - adds to the variable $uri
// 2 - uses the parse_url php server function to retrieve the URL
//     returning it into an associative array. 
//     ['path'] is the first section of the URL.
//     ['query'] is the second section of the URL.
// Example: this means /about?test=this 
// would have a path of /about, and a query of test=this
// 3 - ultimately - storing just the path in the $uri.