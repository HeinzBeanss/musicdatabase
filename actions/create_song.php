<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    if ($_POST['song_name'] == null) {
        echo "No Song Data Received! Heading back.";
        header('Location: ../pages/songs.php');
        exit();
    } else {
        $sql = "INSERT INTO Songs (`name`, `length_seconds`, `artist_id`, `album_id`) VALUES (?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            if (!empty($_POST['song_album'])) {
                $album_id = $_POST['song_album'];
                $stmt->bind_param("siii", $_POST['song_name'], $_POST['song_length'], $_POST['song_artist'], $album_id);
            } else {
                $album_id = null; 
                $stmt->bind_param("siis", $_POST['song_name'], $_POST['song_length'], $_POST['song_artist'], $album_id);
            }

            $executionStatus = $stmt->execute();
    
            if ($executionStatus) {
                echo "Query executed successfully";
            } else {
                echo "Error encountered whilst executing query: " . $conn->error;
            }
        } else {
            echo "There was an error preparing the statement" . $conn->error;
        }
        header('Location: ../pages/songs.php');
        exit();
    }