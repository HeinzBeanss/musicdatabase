<?php 
// dd($data['song']);
require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>

<main>
<h2>Edit Song</h2>

<form id="editForm" action="/songs/update" method="POST">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="song_id" value=<?= $data['song']['0']['song_id'] ?> >

    <div class="label-group">
        <label for="song_name">SONG NAME</label>
        <input id="song_name" type="text" name="song_name" value=<?= $song['0']['name']?> maxlength="40" required>
    </div>

    <div class="label-group">
        <label for="song_length">SONG LENGTH</label>
        <input id="song_length" type="number" name="song_length" step="1" min="10" max="3600" value=<?= $data['song']['0']['length_seconds']?> >
    </div>

    <div class="label-group">
        <label for="song_artist">SONG ARTIST</label>
        <select id="song_artist" name="song_artist">
        <?php foreach ($data['artist_list'] as $artist) { ?>
        <option  value=<?= $artist['artist_id'] ?>
            <?php if ($artist['artist_id'] == $data['song']['0']['artist_id']) echo 'selected'; ?>>
            <?= $artist['name'] ?>
        </option>
        <?php } ?>
    </select>
    </div>

    <div class="label-group">
        <label for="song_album">SONG ALBUM (OPTIONAL)</label>
         <select id="song_album" name="song_album">
            <?php foreach ($data['album_list'] as $album) { ?>
            <option  value=<?= $album['album_id'] ?> 
            <?php if ($album['album_id'] == $data['song']['0']['album_id']) echo 'selected'; ?>>
            <?= $album['name'] ?></option>
            <?php } ?>
            <option value="" <?php if ($data['song']['0']['album_id'] == null) echo 'selected'; ?> >No Album</option>
        </select>
    </div>
</form>

<div class="button-area">
    <button form="editForm">Update Song</button>
    <form action="/songs/destroy" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="song_id" value="<?php echo $data['song']['0']['song_id']; ?>" >
        <button >Delete Song</button>
    </form>
</div>

</main>
<?php

require base_path('views/includes/footer.php');