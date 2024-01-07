<?php 

use Core\Database;

$database = new Database();

if (isset($_GET['song_id'])) {

    // Song
    $database->statement = 
    "SELECT Songs.song_id, Songs.name, Songs.length_seconds, Artists.name AS artist_name, Albums.name AS album_name, Songs.artist_id, Songs.album_id
    FROM Songs
    JOIN Artists ON Songs.artist_id = Artists.artist_id
    LEFT JOIN Albums ON Songs.album_id = Albums.album_id
    WHERE song_id = ?";

    $song = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_GET['song_id']);

    // Artist List
    $database->statement = "SELECT name, artist_id FROM Artists";
    $result = $database->connection->query($database->statement);
    $artist_list = $database->checkResultAndReturn($result);

    // Album List
    $database->statement = "SELECT name, album_id FROM Albums";
    $result = $database->connection->query($database->statement);
    $album_list = $database->checkResultAndReturn($result);
        

    viewPage('songs/edit', [
        'song' => $song,
        'artist_list' => $artist_list,
        'album_list' => $album_list,
    ]);

} else {
    redirect('/albums');
}