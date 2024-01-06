<?php 


use Core\Database;
use Core\Validator;
use Core\Authenticator;
use Core\Session;

$database = new Database();
$authenticator = new Authenticator($database);

extract($_POST);
$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if (! Validator::notEmpty($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if (! Validator::notEmpty($password)) {
    $errors['password'] = "Please input a password.";
}

if (! empty($errors)) {
    foreach ($errors as $key => $error) {
        Session::flash($key, $error, 'errors'); 
    }
    redirect('/login');
}

$status = $authenticator->verifyCredentials($email, $password);

if (! $status) {
    $errors['user'] = "Incorrect login details.";
} 

// dd($errors);

if (! empty($errors)) {
    foreach ($errors as $key => $error) {
        Session::flash($key, $error, 'errors');
    }
    redirect('/login');
} else {
    redirect('/');
}



// fetch the the user from teh database belonging to the email entered, if there is one.
// unhash the database password and check if it's the same one entered, if it is.
// login and redirect.