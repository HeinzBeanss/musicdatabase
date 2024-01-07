<?php 

use Core\Database;

$database = new Database();

$database->statement = 
"SELECT Albums.*, Artists.name AS artist_name
FROM Albums
JOIN Artists ON Albums.artist_id = Artists.artist_id
WHERE album_id = ?";

if (isset($_GET['album_id'])) {
    $result = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_GET['album_id']);
} else {
    redirect('/albums');
}

viewPage("albums/show", $result);