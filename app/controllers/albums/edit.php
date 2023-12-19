<?php 

require base_path('/Config/Database.php');
$database = new Database();

if (isset($_GET['album_id'])) {

    // Album
    $database->statement =
    "SELECT Albums.*, Artists.name AS artist_name
    FROM Albums
    JOIN Artists ON Albums.artist_id = Artists.artist_id
    WHERE album_id = ?";

    $album = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_GET['album_id']);

    // Artist List
    $database->statement = "SELECT name, artist_id FROM Artists";

    $result = $database->connection->query($database->statement);
    $artist_list = $database->checkResultAndReturn($result);
    
    viewPage('albums/edit', [
        'album' => $album,
        'artist_list' => $artist_list
    ]);

} else {
    redirect('/albums');
}

