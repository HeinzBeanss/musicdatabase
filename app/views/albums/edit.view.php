<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

$album = $data['album']['0'];

?>

<main>

<form id="editForm" action="/albums/update" method="POST">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="album_id" value=<?= $album['album_id'] ?> >

    <div class="label-group">
        <label for="album_name">ARTIST NAME</label>
        <input id="album_name" type="text" name="album_name" value=<?= $album['name']?> >
    </div>

    <div class="label-group">
        <label for="album_release_year">RELEASE YEAR</label>
        <input id="album_release_year" type="number" name="release_year" step="1" min="1000" max="2999" value=<?= $album['release_year']?> >
    </div>

    <div class="label-group">
    <label for="album_artist">ALBUM ARTIST</label>
        <select id="album_artist" name="album_artist">
        <?php foreach ($data['artist_list'] as $artist) {
            ?>
        <option  value=<?= $artist['artist_id'] ?> ><?= $artist['name'] ?></option>
        <?php } ?>
    </select>
    </div>
</form>

<div class="button-area">
    <button form="editForm">Update Album</button>
    <form action="/albums/destroy" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>" >
        <button >Delete Album</button>
    </form>
</div>
</main>
<?php

require base_path('views/includes/footer.php');