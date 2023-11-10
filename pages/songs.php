<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    $sql = "SELECT Songs.song_id, Songs.name, Songs.length_seconds, Artists.name AS artist_name, Albums.name AS album_name
    FROM Songs
    JOIN Artists ON Songs.artist_id = Artists.artist_id
    JOIN Albums ON Songs.album_id = Albums.album_id;";

    $result = $conn->query($sql);
    $songsArray = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $songsArray[] = $row;
        }
    } else {
        echo "No Songs were found.";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styleee.css" rel="stylesheet">
    <title>Songs</title>
</head>
<body>
    <?php
    include('../includes/header.php');

    foreach($songsArray as $song) {
        echo '<div class="container">';
        echo '<p class="song-name">' . $song['name'] . '</p>';
        echo '<p class="data-info">' . $song['length_seconds'] . " Seconds" . '</p>';
        echo '<p class="data-info">' . $song['artist_name'] . '</p>';
        echo '<p class="data-info">' . $song['album_name'] . '</p>';
        echo '</div>';
    }

    
    ?>
</body>
</html>