<?php 

use Core\Database;
use Models\Album;
use Models\Artist;

require base_path('/Core/Database.php');
require base_path('/Models/Artist.php');
require base_path('/Models/Album.php');

$database = new Database();

$database->statement = 
"SELECT Artists.artist_id, 
Artists.name AS artist_name, 
birthdate AS artist_birthdate, 
Albums.album_id, 
Albums.name AS album_name, 
Albums.release_year AS album_release_year, 
Albums.artist_id AS album_artist_id
FROM Artists
LEFT JOIN Albums ON Albums.artist_id = Artists.artist_id";

$result = $database->connection->query($database->statement);
$artist_array = $database->checkResultAndReturn($result);

$artists_formatted = [];

foreach ($artist_array as $item) {
    $artistId = $item['artist_id'];

    if (!isset($artists_formatted[$artistId])) {
        $artists_formatted[$artistId] = new Artist($item['artist_id'], $item['artist_name'], $item['artist_birthdate']);
    }
        $album = new Album($item['album_id'], $item['album_name'], $item['album_release_year'], $item['album_artist_id']);
        $artists_formatted[$artistId]->AddAlbum($album);    
}

viewPage('artists/index', $artists_formatted);