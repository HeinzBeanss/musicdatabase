<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>
<form action="/albums/store" method="POST">

    <div class="label-group">
        <label for="artist_album">ALBUM NAME</label>
        <input type="text" name="album_name" id="album_name" required>
    </div>

    <div class="label-group">
        <label for="album_release_year">RELEASE YEAR</label>
        <input type="number" value="2023" step="1" min="1000" max="2999" name="album_release_year" id="album_release_year" required>
    </div>

    
    <div class="label-group">
        <label for="album_artist">ALBUM ARTIST</label>
        <select id="album_artist" name="album_artist" required>
            <?php
            if (count($data) > 0) {
                foreach ($data as $artist) {
                    $artist_id = $artist['artist_id'];
                    $artist_name = $artist['name'];
                    echo "<option value=$artist_id>$artist_name</option>";
                }
            }
            ?>
        </select>
    </div>
    <button>Add Album</button>
</form>
</main>
<?php

require base_path('views/includes/footer.php');