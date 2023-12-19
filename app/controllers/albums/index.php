<?php 

require base_path('/Config/Database.php');
$database = new Database();

$database->statement = 
"SELECT Albums.*, Artists.name AS artist_name
FROM Albums
JOIN Artists ON Albums.artist_id = Artists.artist_id";

$result = $database->connection->query($database->statement);
$album_list = $database->checkResultAndReturn($result);

viewPage('albums/index', $album_list);