<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    echo $_POST['artist_name'];
    echo $_POST['artist_birthdate'];
    echo $_POST['artist_id'];

    if ($_POST['artist_id'] == null ) {
        echo "No data received! Heading back.";
        header('Location: ../pages/artists.php');
        exit();
    } else {
        $artist_name = $_POST['artist_name'];
        $artist_birthdate = $_POST['artist_birthdate'];
        $artist_id = $_POST['artist_id'];

        $sql = "UPDATE Artists SET name = ?, birthdate = ? WHERE artist_id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('ssi', $artist_name, $artist_birthdate, $artist_id);
            $executionStatus = $stmt->execute();

            if ($executionStatus) {
                echo "Query executed! Redirecting...";
                header('Location: ../pages/artists.php');
                exit();
            } else {
                echo "Query Failed! : " . $conn->error;
                header('Location: ../pages/artists.php');
                exit();
            }
        } else {
            echo "There was a problem preparing the statement" . $conn->error;
        }
    }