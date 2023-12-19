<?php 

require base_path('/Config/Database.php');
$database = new Database();

if (isset($_POST['album_id'])) {

    extract($_POST);
    $database->statement = "UPDATE Albums SET name = ?, release_year = ?, artist_id = ? WHERE album_id = ?";
    $success = $database->executePreparedStatement($_SERVER['REQUEST_METHOD'], $database->statement, 'siii', $album_name, $release_year, $album_artist, $album_id);

    if ($success) {
        redirect("/album?album_id={$album_id}");
    } else {
        abort(500);
    }

} else {
    redirect('/albums');
}