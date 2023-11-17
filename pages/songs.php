<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');

    $sql = "SELECT Songs.song_id, Songs.name, Songs.length_seconds, Artists.name AS artist_name, Albums.name AS album_name
    FROM Songs
    JOIN Artists ON Songs.artist_id = Artists.artist_id
    LEFT JOIN Albums ON Songs.album_id = Albums.album_id;";

    $result = $conn->query($sql);
    $songsArray = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $songsArray[] = $row;
        }
    } else {
        echo "No Songs were found.";
    }

    $sql_artists = "SELECT name, artist_id FROM Artists";
    $result_artists = $conn->query($sql_artists);
    $artist_list = [];
    if ($result_artists->num_rows > 0) {
        while ($row = $result_artists->fetch_assoc()) {
            $artist_list[] = $row;
        }
    } else {
        // no artists found, which is fine.
    }

    $sql_albums = "SELECT name, album_id FROM Albums";
    $result_albums = $conn->query($sql_albums);
    $album_list = [];
    if ($result_albums->num_rows > 0) {
        while ($row = $result_albums->fetch_assoc()) {
            $album_list[] = $row;
        }
    } else {
        // no artists found, which is fine.
    }

    $conn->close();

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
    ?>
    <h2>Add a Song</h2>
    <form action="../actions/create_song.php" method="POST">
        <label for="song_name">Song Name:
            <input type="text" maxlength="40" id="song_name" name="song_name" required>
        </label>

        <label for="song_length">Song Length (Seconds)
            <input type="number" min="1" max="10000" id="song_length" name="song_length">
        </label>

        <label for="song_artist">Select Song Artist:
            <select id="song_artist" name="song_artist" required>
                <?php
                if (count($artist_list) > 0) {
                    foreach ($artist_list as $artist) {
                        $artist_id = $artist['artist_id'];
                        $artist_name = $artist['name'];
                        echo "<option value=$artist_id>$artist_name</option>";
                    }
                }
                ?>
            </select>
        </label>

        <label for="song_album">Select Song Artist:
            <select id="song_album" name="song_album">
                <?php
                if (count($album_list) > 0) {
                    foreach ($album_list as $album) {
                        $album_id = $album['album_id'];
                        $album_name = $album['name'];
                        echo "<option value=$album_id>$album_name</option>";
                    }
                }
                ?>
                <option value="">No Album</option>
            </select>
        </label>

        <button>Add Song</button>
    </form>


    <?php

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