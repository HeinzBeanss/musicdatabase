<form action="../actions/create_album.php" method="POST">
    <label for="artist_album">Album Name:
        <input type="text" name="album_name" id="album_name" required>
    </label>
    <label for="album_release_year">Album Release Year:
        <input type="number" value="2023" step="1" min="1000" max="2999" name="album_release_year" id="album_release_year" required>
    </label>
    <label for="album_artist">Select Album Artist:
        <select id="album_artist" name="album_artist" required>
            <?php
            if (count($artist_list) > 0) {
                foreach ($artist_list as $artist) {
                    $artist_id = $artist['artist_id'];
                    $artist_name = $artist['name'];
                    echo "<option value=$artist_id>$artist_name</option>";
                }
            }
            ?>
        </select>
    </label>
    <button>Add Album</button>
</form>