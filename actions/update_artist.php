<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    echo $_POST['artist_name'];
    echo $_POST['artist_birthdate'];
    echo $_POST['artist_id'];