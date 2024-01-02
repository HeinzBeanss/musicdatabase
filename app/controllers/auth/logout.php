<?php 

use Core\Authenticator;

require base_path('/Core/Authenticator.php');

$auth = new Authenticator(); 
$auth->logout();

redirect('/');