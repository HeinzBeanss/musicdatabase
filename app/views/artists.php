
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styleee.css" rel="stylesheet">
    <title>Artists</title>
    <script src="../functions/toggleInputDisplayArtists.js"></script>
</head>
<body>
    <?php
    include('includes/header.php');

    ?>

    <h2>Add an Artist</h2>
    <form action="../actions/create_artist.php" method="POST">
        <label for="artist_name">Artist Name:
            <input type="text" name="artist_name" id="artist_name" required>
        </label>

        <label for="artist_birthdate">Artist Birthdate:
            <input type="date" name="artist_birthdate" id="artist_birthdate" required>
        </label>

        <button>Add Artist</button>
    </form>

    <?php
    foreach($artists_formatted as $artist) {
        echo '<div class="container">';

        echo '<form id="editForm' . $artist->artist_id .'" action="../actions/update_artist.php" method="POST">';

        echo '<p class="artist_' . $artist->artist_id . ' name">' . $artist->artist_name . '</p>';
        echo '<p class="artist_' . $artist->artist_id . ' birthdate">' . $artist->artist_birthdate . '</p>';
        echo "<input type='hidden' value=$artist->artist_id name='artist_id'>";

        echo '</form>';

        echo '<p class="data-info">' . "Albums: " . '</p>';
        foreach($artist->albums as $album) {
            echo '<p class="data-info">' . $album->album_name . ' - ' . $album->album_release_year . '</p>';
        }
        echo '<p class="data-info">' .'</p>';
        ?>

        <button form="editForm<?php echo "$artist->artist_id"?>" type="submit" class="<?php echo 'editartist_' . $artist->artist_id ?> edit"  onclick="toggleDisplay(<?php echo $artist->artist_id ?>, event)">Edit Artist</button>

        <form action="../actions/delete_artist.php" method="POST">
            <input type="hidden" name="artist_id" value="<?php echo $artist->artist_id; ?>" >
            <button>Delete Artist</button>
        </form>



       


        <?php
        echo '</div>';
    }
    ?>
</body>
</html>