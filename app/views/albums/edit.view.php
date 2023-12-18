<?php

foreach ($data as $album) {
    echo '<div class="container">';
    echo '<form id="editForm' . $album['album_id'] .'" action="../actions/update_album.php" method="POST">';
    echo '<p class="album_' . $album['album_id'] .' name">' . $album['name'] . '</p>';
    echo '<p class="album_' . $album['album_id'] .' release_year">' . $album['release_year'] . '</p>';
    echo '<p class="album_' . $album['album_id'] .' album_artist artist_' . $album['artist_id'] .'">' . $album['artist_name'] . '</p>';
    echo '<input type="hidden" value="' . $album['album_id'] . '" name="album_id">';
    echo '</form>';
    ?>
    <button 
    form="editForm<?php echo $album['album_id']?>" 
    type="button" 
    class="<?php echo 'editalbum_' . $album['album_id'] ?> edit" 
    onclick="toggleDisplay(
        <?php echo $album['album_id'] ?>, 
        <?php echo htmlspecialchars($jsonArtists) ?>, 
        event)">Edit Album</button>
    <form action="../actions/delete_album.php" method="POST">
        <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>" >
        <button>Delete Album</button>
    </form>
    <?php
    echo '</div>'; 
    // Display other album-specific details
}
?>