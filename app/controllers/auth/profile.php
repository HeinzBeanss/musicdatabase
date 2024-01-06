<?php 

use Core\Database;

$database = new Database();

if ($_SESSION['user']) {

    $database->statement = "SELECT *, Artists.name AS artist_name, Songs.name as song_name
    FROM User_Playlists
    INNER JOIN Users ON Users.id = User_Playlists.user_id
    INNER JOIN Songs ON Songs.song_id = User_Playlists.song_id
    INNER JOIN Artists ON Artists.artist_id = Songs.artist_id
    WHERE user_id = ?";

    $user_songs = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_SESSION['user']['user_id']);

    viewPage('/auth/profile', $user_songs);
} else {
    redirect('/');
}

