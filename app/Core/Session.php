<?php

namespace Core;

class Session {

    public static function flash($key, $value, $grouping = null) {
        if ($grouping) {
            $_SESSION['_flash'][$grouping][$key] = $value;
        } else {
            $_SESSION['_flash'][$key] = $value;
        }
    
    }

    public static function unflash() {
        unset($_SESSION['_flash']);
    }
    
    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}