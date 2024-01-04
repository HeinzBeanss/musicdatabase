<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

extract($_POST);
$user_songs =[];

// get a list of all songs that the user has in their playlist
$database->statement = "SELECT * FROM User_Playlists WHERE user_id = ?";
$user_songs_full = $database->executePreparedStatement('GET', $database->statement, 'i', $user_id);

if ($user_songs_full) {
    foreach ($user_songs_full as $song) {
            $user_songs[] = $song['song_id'];
    }
}

if (in_array($song_id, $user_songs)) {
    // remove
    $database->statement = "DELETE FROM User_Playlists WHERE `user_id` = ? AND `song_id` = ?";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, "ii", $user_id, $song_id);

    if ($success) {
        redirect($url);
    } else {
        abort(500);
    }

} else {
    // add
    $database->statement = "INSERT INTO User_Playlists (`user_id`, `song_id`) VALUES (?, ?)";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, "ii", $user_id, $song_id);

    if ($success) {
        redirect($url);
    } else {
        abort(500);
    }
}

