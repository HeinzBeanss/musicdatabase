<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    echo $_POST['album_id'];
    echo $_POST['album_name'];
    echo $_POST['album_release_year'];
    // echo $_POST['artist_id'];