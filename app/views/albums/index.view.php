<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>

<?php
 echo "<h2>Album Collection</h2>";
foreach ($data as $album) {
    echo '<div class="container">';
    echo '<p class="album_' . $album['album_id'] .' name">' . $album['name'] . '</p>';
    echo '<p class="album_' . $album['album_id'] .' release_year">' . $album['release_year'] . '</p>';
    echo '<p class="album_' . $album['album_id'] .' album_artist artist_' . $album['artist_id'] .'">' . $album['artist_name'] . '</p>';
    echo '<input type="hidden" value="' . $album['album_id'] . '" name="album_id">';
    echo '</div>'; 
}

require base_path('views/includes/footer.php');