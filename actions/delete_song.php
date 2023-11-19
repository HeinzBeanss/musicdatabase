<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    if ($_POST['song_id'] == null) {
        echo "No data received! Heading back.";
        header("Location: ../pages/songs.php");
        exit();
    } else {
        $song_id = $_POST['song_id'];

        $sql = "DELETE FROM Songs WHERE song_id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('i', $song_id);
            $executionStatus = $stmt->execute();

            if ($executionStatus) {
                echo "Query executed!";
                header('Location: ../pages/songs.php');
                exit();
            } else {
                echo "There was an error executing the statement" . $conn->error;
            }
        } else {
            echo "There was an error preparing the statement" . $conn->error;
        }
    }