<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

$album = $data['album']['0'];

?>

<h2><?= $album['name']?></h2>

<form id="editForm" action="/albums/update" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="album_id" value=<?= $album['album_id'] ?> >
    <input type="text" name="album_name" value=<?= $album['name']?> >
    <input type="number" name="release_year" step="1" min="1000" max="2999" value=<?= $album['release_year']?> >
    <select name="album_artist">
        <?php foreach ($data['artist_list'] as $artist) {
            ?>
        <option  value=<?= $artist['artist_id'] ?> ><?= $artist['name'] ?></option>
        <?php } ?>
    </select>
</form>

<div class="button-area">
    <button form="editForm">Update Album</button>
    <form action="/albums/destroy" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>" >
        <button>Delete Album</button>
    </form>
</div>

<?php

require base_path('views/includes/footer.php');