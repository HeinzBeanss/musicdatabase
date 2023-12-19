<?php

function dd($value) {

    echo "<pre>";
    var_dump($value);
    echo "<pre>";
    die();

}

function redirect($location) {
    
    header("location: {$location}");
    die();

}

function base_path($path) {

    return BASE_PATH . $path;

}

function viewPage($path, $data = []) {

    extract($data);
    require base_path("views/{$path}.view.php");
    
}

function abort($errorCode = 404) {

    http_response_code($errorCode);
    viewPage("errors/$errorCode");
    die();
    
}
