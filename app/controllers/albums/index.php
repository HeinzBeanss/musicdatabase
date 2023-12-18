<?php 

require base_path('/Config/Database.php');
$database = new Database();

// Fetching Albums
$database->statement = 
"SELECT Albums.*, Artists.name AS artist_name
FROM Albums
JOIN Artists ON Albums.artist_id = Artists.artist_id";

$result = $database->connection->query($database->statement);
$album_list = $database->checkResultAndReturn($result);

if ($album_list) {
    viewPage('albums/index', $album_list);
}