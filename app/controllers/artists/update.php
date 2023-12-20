<?php 

use Core\Database;

require base_path('/Core/Database.php');
$database = new Database();

if (isset($_POST['artist_id'])) {

    $database->statement = "UPDATE Artists SET name = ?, birthdate = ? WHERE artist_id = ?";

    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'ssi', $_POST['artist_name'], $_POST['artist_birthdate'], $_POST['artist_id']);
  
    if ($success) {
        redirect("/artist?artist_id={$_POST['artist_id']}");
    } else {
        abort(500);
    }
} else {
    redirect('/artists');
}
