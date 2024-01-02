<?php

namespace Core;

class Validator {

    public static function notEmpty($value) {
        return strlen($value) > 0;
    }

    public static function minMaxCharacters(string $value, $min, $max): bool {

        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;

    }

    public static function email(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // validate password x2
    public static function passwordsMatchCheck($passwordOne, $passwordTwo) {
        return $passwordOne === $passwordTwo;
    }

}

