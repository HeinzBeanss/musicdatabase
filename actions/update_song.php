<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    echo $_POST['song_id'];
    echo "<br>";
    echo $_POST['song_name'];
    echo "<br>";
    echo $_POST['song_length'];
    echo "<br>";
    echo $_POST['song_artist'];
    echo "<br>";
    echo $_POST['song_album'];

    if ($_POST['song_id'] == null) { 
        echo "No data recevied! Heading back...";
        header('Location: ../pages/songs.php');
        exit();
    } else {
        $song_id = $_POST['song_id'];
        $song_name = $_POST['song_name'];
        $song_length = $_POST['song_length'];
        $song_artist = $_POST['song_artist'];

        $sql = "UPDATE Songs SET name = ?, length_seconds = ?, artist_id = ?, album_id = ? WHERE song_id = ?"; 

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            if (!empty($_POST['song_album'])) {
                $song_album = $_POST['song_album'];
                $stmt->bind_param("siiii", $song_name, $song_length, $song_artist, $song_album, $song_id);
            } else {
                $song_album = null;
                $stmt->bind_param("siiis", $song_name, $song_length, $song_artist, $song_album, $song_id);
            }
            $executionStatus = $stmt->execute();
            if ($executionStatus) {
                echo "Query executed!";
                header('Location: ../pages/songs.php');
                exit();
            } else {
                echo "There was an error executing the query" . $conn->error;
            }
        } else {
            echo "There was an error preparing the statement" . $conn->error;
        }
    }