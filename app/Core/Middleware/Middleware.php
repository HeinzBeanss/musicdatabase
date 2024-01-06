<?php

namespace Core\Middleware;

use Exception;

require base_path('Core/Middleware/Guest.php');
require base_path('Core/Middleware/Authenticated.php');

class Middleware {

    // This is basically a basic middleware router, it decides which middleware to run.
    // Also known as a middleware resolver.

    // Map any middleware to the array.
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class
    ];


    public static function resolve($key) {
        if (! $key) {
            // No key 
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new Exception("No matching middleware found for key '{$key}'");
        }

        (new $middleware)->handle();

    } 
}