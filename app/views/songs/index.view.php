<?php 
// dd($data);
require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<div class="main-title-banner">
    <h2>Song Collection</h2>
    <a class="buttonref" href="/songs/create">Add Song</a>
</div>

<?php foreach ($data as $song) { ?>

    <div class="container">
    <a href="/song?song_id=<?= $song['song_id'] ?>"><h3 class="song_title"><?= $song['name']?></h5></a>
    <p class="song_length"><?= $song['length_seconds']?> Seconds</p>
    <a href="/artist?artist_id=<?= $song['artist_id'] ?>"><p class="song_artist_name"><?= $song['artist_name']?></p></a>
    <a <?= isset($song['album_id']) ? 'href="album?album_id=' . $song['album_id'] . '"' : 'disabled'; ?>><p><?= $song['album_name'] ?? ''; ?></p></a>


</div>

<?php } ?>
</main>
<?php
require base_path('views/includes/footer.php');