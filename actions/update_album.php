<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    if ($_POST['album_id'] == null) {
        echo "No data received! Heading back...";
        header('Location: ../pages/albums.php');
        exit();
    } else {
        $album_id = $_POST['album_id'];
        $album_name = $_POST['album_name'];
        $album_release_year = $_POST['album_release_year'];
        $album_artist = $_POST['album_artist'];
    
        $sql = "UPDATE Albums SET name = ?, release_year = ?, artist_id = ? WHERE album_id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("siii", $album_name, $album_release_year, $album_artist, $album_id);
            $executionStatus = $stmt->execute();
            if ($executionStatus) {
                echo "Query executed!";
                header('Location: ../pages/albums.php');
                exit();
            } else {
                echo "There was an error preparing the statement" . $conn->error;
            }
        } else {
            echo "There was an error preparing the statement" . $conn->error;
        }


    }