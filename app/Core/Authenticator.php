<?php

namespace Core;

use Core\Database;
use Core\Session;

require base_path('/Core/Session.php');

Class Authenticator {
    // depedency injection
    private $database;

    public function __construct(Database $database = null) {
        $this->database = $database;
    }
    
    public function verifyCredentials($email, $password) {
        $this->database->statement = "SELECT * FROM Users WHERE email = ?";
        $user = $this->database->executePreparedStatement("GET", $this->database->statement, 's', $email);
        // dd($user);

        if ($user) {
            // dd($user);
            if (password_verify($password, $user['0']['password'])) {
                $this->login($user);

                return true;
            }
        } else {
            return false;
         }
    }

    public function login($user) {
        $_SESSION['user'] = [
            'username' => $user['0']['name'],
            'email' => $user['0']['email'],
            'user_id' => $user['0']['id'],
            'date_created' => $user['0']['date_created']
        ];

        // Updates the session, refreshes it basically.
        session_regenerate_id(true);
    }
    
    public function logout() {
        Session::destroy();
    }
}