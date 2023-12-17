<?php 

    echo "Page: ";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    if ($_POST['album_name'] == null) {
        echo "No Album Data Received! Heading back.";
        header ('Location ../pages/albums.php');
        exit();
    } else {
        print_r($_POST['album_name']);
        print_r($_POST['album_release_year']);
        print_r($_POST['album_artist']);

        $sql = "INSERT INTO Albums (`name`, `release_year`, `artist_id`) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sii", $_POST['album_name'], $_POST['album_release_year'], $_POST['album_artist']);
            $executionStatus = $stmt->execute();
    
            if ($executionStatus) {
                echo "Query executed successfully";
            } else {
                echo "Error encountered whilst executing query: " . $conn->error;
            }
    
            $stmt->close();
            $conn->close();

        } else {
            echo "There was an error preparing the statement" . $conn->error;
        }

        header('Location: ../pages/albums.php');
        exit();
    }