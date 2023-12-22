<?php

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

$database->statement =
"INSERT INTO Songs (`name`, `length_seconds`, `artist_id`, `album_id`) VALUES (?, ?, ?, ?)";


if (isset($_POST['song_name'])) {

    if ($_POST['song_album'] === '') {

        $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, "siis", $_POST['song_name'], $_POST['song_length'], $_POST['song_artist'], null);

        redirect('/songs');
    } else {
        $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'siii', $_POST['song_name'], $_POST['song_length'], $_POST['song_artist'], $_POST['song_album']);
        
        redirect('/songs');
    }

} else {
    redirect('/songs');
}