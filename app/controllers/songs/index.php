<?php 

use Core\Database;

$database = new Database();

$database->statement = 
"SELECT Songs.song_id, Songs.name, Songs.length_seconds, Artists.name AS artist_name, Albums.name AS album_name, Songs.artist_id, Songs.album_id
FROM Songs
JOIN Artists ON Songs.artist_id = Artists.artist_id
LEFT JOIN Albums ON Songs.album_id = Albums.album_id";

$result = $database->connection->query($database->statement);
$song_list = $database->checkResultAndReturn($result);

$user_songs = [];

if (isset($_SESSION['user'])) {
    
    $database->statement = "SELECT * FROM User_Playlists WHERE user_id = ?";
    $user_songs_full = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_SESSION['user']['user_id']);

    if ($user_songs_full) {
    
        foreach ($user_songs_full as $song) {
            $user_songs[] = $song['song_id'];
        }
    }

}

viewPage('songs/index', [
    'song_list' => $song_list,
    'user_songs' => $user_songs
]);