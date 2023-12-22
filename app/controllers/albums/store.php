<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

$database->statement =
"INSERT INTO Albums (`name`, `release_year`, `artist_id`) VALUES (?, ?, ?)";

if (isset($_POST['album_name'])) {

    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'sii', $_POST['album_name'], $_POST['album_release_year'], $_POST['album_artist']);

    if ($success) {
        redirect('/albums');
    }

} else {
    redirect('albums/create');
}