<?php 

use Core\Database;
require base_path('/Core/Database.php');

$database = new Database();

$database->statement = 
"SELECT Songs.song_id, Songs.name, Songs.length_seconds, Artists.name AS artist_name, Albums.name AS album_name, Songs.artist_id, Songs.album_id
FROM Songs
JOIN Artists ON Songs.artist_id = Artists.artist_id
LEFT JOIN Albums ON Songs.album_id = Albums.album_id";

$result = $database->connection->query($database->statement);
$song_list = $database->checkResultAndReturn($result);

viewPage('songs/index', $song_list);