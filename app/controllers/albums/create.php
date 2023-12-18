<?php 



    if ($_POST['album_name'] == null) {

        header ('Location ../pages/albums.php');
        exit();

    } else {

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