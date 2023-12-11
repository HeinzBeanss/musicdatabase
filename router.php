<?php
echo $_SERVER['DOCUMENT_ROOT'];
echo '<br>';
    

$base_url = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Remove repeated part from the URI
$projectName = '/project5-musiclibrary';
$adjustedUri = rtrim($uri, '/') . str_replace($projectName, '', $base_url);

// Adjusted URI will now be something like: /pages/albums.php


// 1 - adds to the variable $uri
// 2 - uses the parse_url php server function to retrieve the URL
//     returning it into an associative array. 
//     ['path'] is the first section of the URL.
//     ['query'] is the second section of the URL.
// Example: this means /about?test=this 
// would have a path of /about, and a query of test=this
// 3 - ultimately - storing just the path in the $uri.

// base url for this directory

// create routes in an associative array
$routes = [
    $base_url . '/' => $base_url . '/pages/albums.php', // '/project5-musiclibrary/pages/albums.php'
    $base_url . '/albums' => $base_url . '/pages/albums.php',
    $base_url . '/artists' => $base_url . '/pages/artists.php',
    $base_url . '/songs' => $base_url . '/pages/songs.php',
];

function routeToController($uri, $routes) {
        // Remove the base URL from the request URI
        // $uri = str_replace($base_url, '', $uri);
        // echo $uri;
        echo "current uri: $uri";
        print_r($routes);
    if (array_key_exists($uri, $routes)) {
        echo "THIS GOES THROUGH";
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

routeToController($adjustedUri, $routes);