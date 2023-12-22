<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

if (isset($_POST['song_id'])) {

    $database->statement = "DELETE FROM Songs WHERE song_id = ?";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'i', $_POST['song_id']);

    if ($success) {
        redirect('/songs');
    } else {
        abort(500);
    }
} else {
    redirect('/songs');
}