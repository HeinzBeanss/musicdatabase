<?php 

use Core\Database;

$database = new Database();

$database->statement = "UPDATE Songs SET name = ?, length_seconds = ?, artist_id = ?, album_id = ? WHERE song_id = ?";

if (isset($_POST['song_id'])) {

    extract($_POST);
    
    if ($_POST['song_album'] === '') {

        $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'siiis', $song_name, $song_length, $song_artist, null, $song_id);
        
        if ($success) {
            redirect("/song?song_id={$song_id}");
        } else {
            abort(500);
        }

    } else {

        $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'siiii', $song_name, $song_length, $song_artist, $song_album, $song_id);

        if ($success) {
            redirect("/song?song_id={$song_id}");
        } else {
            abort(500);
        }
    }

} else {
    redirect('/songs'); 
}