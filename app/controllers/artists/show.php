<?php 

use Core\Database;
use Models\Album;
use Models\Artist;

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
LEFT JOIN Albums ON Albums.artist_id = Artists.artist_id
WHERE Artists.artist_id = ?";

if (isset($_GET['artist_id'])) {
    $result = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_GET['artist_id']);

    $artist_formatted = new Artist($result['0']['artist_id'], $result['0']['artist_name'], $result['0']['artist_birthdate']);

    foreach ($result as $item) {
        $album = new Album($item['album_id'], $item['album_name'], $item['album_release_year'], $item['album_artist_id']);
        $artist_formatted->AddAlbum($album);    
    }
    
} else {
    redirect('/artists');
}

viewPage("artists/show", $artist_formatted);