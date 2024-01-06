<?php 

use Core\Database;

$database = new Database();

$database->statement = 
"INSERT INTO Artists (`name`, `birthdate`) VALUES (?, ?)";

if (isset($_POST['artist_name'])) {
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, "ss", $_POST['artist_name'], $_POST['artist_birthdate']);

    if ($success) {
        redirect('/artists');
    } else {
        abort(500);
    }

} else {
    redirect('/artists');
}