<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

if (isset($_POST['album_id'])) {

    $database->statement = "DELETE FROM Albums WHERE album_id = ?";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_POST['album_id']);

    if ($success) {
        redirect('/albums');
    } else {
        abort(500);
    }
} else {
    redirect('/albums');
}