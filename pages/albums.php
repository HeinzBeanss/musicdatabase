<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    // Connect to database
    include('../config/db.php');

    // Database Query to get the relevant data
    // Query
    $sql = "SELECT Albums.*, Artists.name AS artist_name
            FROM Albums
            JOIN Artists ON Albums.artist_id = Artists.artist_id";

    // Execute
    $result = $conn->query($sql);

    // Initialize an empty array to store the results
    $albumsArray = [];

    // Check if it's returned anything
    if ($result->num_rows > 0) {
        //Fetch each row as an associative array
        while ($row = $result->fetch_assoc()) {
            // Add the row to the $albumsArray
            $albumsArray[] = $row;
        }
    } else {
        $albumsArray = array('message' => 'No albums found.');
    }

    $conn->close();

    // print_r($albumsArray); // Display the array (for testing)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styleee.css" rel="stylesheet">
    <title>Albums</title>
</head>
<body>
    <?php
    include('../includes/header.php');

    // display the data gathered from the query
    foreach ($albumsArray as $album) {
        echo '<div class="container">';
        echo '<p class="album-name">' . $album['name'] . '</p>';
        echo '<p class="data-info">Release Year: ' . $album['release_year'] . '</p>';
        echo '<p class="data-info">Artist: ' . $album['artist_name'] . '</p>';
        echo '</div>'; 

        // Display other album-specific details
    }
    ?>

</body>
</html>