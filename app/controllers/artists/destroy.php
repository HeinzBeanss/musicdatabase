<?php 

use Core\Database;

$database = new Database();

if (isset($_POST['artist_id'])) {

    $database->statement = "DELETE FROM Artists WHERE artist_id = ?";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_POST['artist_id']);

    if ($success) {
        redirect('/artists');
    } else {
        abort(500);
    }
} else {
    redirect('/artists');
}