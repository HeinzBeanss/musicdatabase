<?php 

use Core\Database;
use Core\Validator;

$database = new Database();

$database->statement =
"INSERT INTO Albums (`name`, `release_year`, `artist_id`) VALUES (?, ?, ?)";

$errors = [];

if (isset($_POST['album_name'])) {

    if (! Validator::minMaxCharacters($_POST['album_name'], 1, 50)) {
        $errors['name'] = "Album name cannot exceed 50 characters, or be under 1 character"; 
    } 

    if (! empty($errors)) {
        return viewPage("albums/create", [
            'errors' => $errors
        ]);
    }

    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'sii', $_POST['album_name'], $_POST['album_release_year'], $_POST['album_artist']);

    if ($success) {
        redirect('/albums');
    }

} else {
    redirect('albums/create');
}