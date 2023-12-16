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

