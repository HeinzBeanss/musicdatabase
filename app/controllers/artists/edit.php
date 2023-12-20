<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

if (isset($_GET['artist_id'])) {

    $database->statement = "SELECT * FROM Artists WHERE artist_id = ?";
    $artist = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_GET['artist_id']);

    viewPage('/artists/edit', $artist);

} else {

    redirect('/artists');
    
}