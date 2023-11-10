<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');
    
    $sql = "SELECT Artists.* FROM Artists";
    $result = $conn->query($sql);

    $artistsArray = [];


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $artistsArray[] = $row;
        }
       } else {
        $artistsArray = ['message' => 'No artists found.'];
       }

       $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styleee.css" rel="stylesheet">
    <title>Artists</title>
</head>
<body>
    <?php
    include('../includes/header.php');

    foreach($artistsArray as $artist) {
        echo '<div class="container">';
        echo '<p class="artist-name">' . $artist['name'] . '</p>';
        echo '<p class="data-info">' . $artist['birthdate'] . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>