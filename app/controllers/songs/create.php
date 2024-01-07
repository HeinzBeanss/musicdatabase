<?php

use Core\Database;

$database = new Database();

$database->statement = 
"SELECT name, artist_id FROM Artists";

$result = $database->connection->query($database->statement);
$artist_list = $database->checkResultAndReturn($result);

$database->statement = 
"SELECT name, album_id FROM Albums";

$result = $database->connection->query($database->statement);
$album_list = $database->checkResultAndReturn($result);

viewPage('/songs/create', [
    'artist_list' => $artist_list,
    'album_list' => $album_list
]);

    