<?php

use Core\Database;
use Core\Validator;
use Core\Authenticator;


$database = new Database();
$authenticator = new Authenticator($database);

extract($_POST);
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if (! Validator::minMaxCharacters($username, 4, 30)) {
    $errors['username'] = "Please provide a username between 4-30 characters long.";
}

if (! Validator::minMaxCharacters($password, 6, 24)) {
    $errors['password'] = "Please provide a password between 6-24 characters long.";
}

if (! Validator::passwordsMatchCheck($password, $password_two)) {
    $errors['password'] = "Passwords do not match.";
}

$database->statement = "SELECT * FROM Users WHERE name = ?";
$user = $database->executePreparedStatement('GET', $database->statement, 's', $username);

if ($user) {
    $errors['user'] = "This user already exists";
} 

if (! empty($errors)) {
    viewPage('/auth/signup', [
        'errors' => $errors,
    ]);

    return;
}

$database->statement = "INSERT INTO Users(`name`, `email`, `password`) VALUES (?, ?, ?)";
$success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'sss', $username, $email, $hashed_password);

if ($success) {

    $database->statement = "SELECT * FROM Users WHERE email = ?";
    $user = $database->executePreparedStatement('GET', $database->statement, 's', $email);
    $authenticator->login($user);
    redirect('/');

} else {
    abort(500);
}

