<?php 

require base_path('/Config/Database.php');
$database = new Database();

$database->statement = 
"SELECT name, artist_id FROM Artists";

$result = $database->connection->query($database->statement);
$artist_list = $database->checkResultAndReturn($result);

viewPage('albums/create', $artist_list);