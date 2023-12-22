<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>
<h2>Add a Song</h2>

<form action="/songs/store" method="POST">

        <div class="label-group">
            <label for="song_name">SONG NAME</label>
            <input type="text" maxlength="40" id="song_name" name="song_name" required>
        </div>


        <div class="label-group">
            <label for="song_length">SONG LENGTH</label>
            <input type="number" min="1" max="10000" id="song_length" name="song_length" required>
        </div>

        <div class="label-group">
            <label for="song_artist">SONG ARTIST</label>
                <select id="song_artist" name="song_artist" required>
                    <?php
                    if (count($data['artist_list']) > 0) {
                        foreach ($data['artist_list'] as $artist) {
                            // $artist_id = $artist['artist_id'];
                            // $artist_name = $artist['name'];
                            echo "<option value={$artist['artist_id']}>{$artist['name']}</option>";
                        }
                    }
                    ?>
                </select>
        </div>


        <div class="label-group">
            <label for="song_album">SONG ALBUM (OPTIONAL)</label>
                <select id="song_album" name="song_album">
                    <?php
                    if (count($data['album_list']) > 0) {
                        foreach ($data['album_list'] as $album) {
                            // $album_id = $album['album_id'];
                            // $album_name = $album['name'];
                            echo "<option value={$album['album_id']}>{$album['name']}</option>";
                        }
                    }
                    ?>
                    <option value="">No Album</option>
                </select>
        </div>


    <button>Add to Collection</button>
</form>
</main>
<?php

require base_path('views/includes/footer.php');