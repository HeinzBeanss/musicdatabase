<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    if ($_POST['artist_name'] == null) {
        echo "No data recevied!";
        header('Location: ../pages/artists.php');
        exit();
    } else {
        print_r($_POST['artist_name']);
        print_r($_POST['artist_birthdate']);

        $artist_name = $_POST['artist_name'];
        $artist_birthdate = $_POST['artist_birthdate'];
    
        $sql = "INSERT INTO Artists (`name`, `birthdate`)
        VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $artist_name, $artist_birthdate);
            $executionStatus = $stmt->execute();
        
            if ($executionStatus) {
                echo "Query executed successfully";
            } else {
                echo "Error executing the query: " . $conn->error;
            }
        
            $stmt->close();
            $conn->close();
        } else {
            echo "There was an issue preparing the statement" . $conn->error;
        }
     
        header('Location: ../pages/artists.php');
        exit();
        // print_r($_POST['artist_name']);
        // print_r($_POST['artist_birthdate']);
    }
