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

<?php foreach ($data['song_list'] as $song) { ?>

    <div class="container">
    <a href="/song?song_id=<?= $song['song_id'] ?>"><h3 class="song_title"><?= $song['name']?></h5></a>
    <p class="song_length"><?= $song['length_seconds']?> Seconds</p>
    <a href="/artist?artist_id=<?= $song['artist_id'] ?>"><p class="song_artist_name"><?= $song['artist_name']?></p></a>
    <a <?= isset($song['album_id']) ? 'href="album?album_id=' . $song['album_id'] . '"' : 'disabled'; ?>><p><?= $song['album_name'] ?? ''; ?></p></a>
    
    <?php if ($_SESSION['user'] ?? false) : ?>
        <form action="playlist/update" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="song_id" value="<?= $song['song_id']?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id']?>">
            <input type="hidden" name="url" value="/songs">
            <button type="submit">
                <?= (in_array($song['song_id'], $data['user_songs'])) ? "REMOVE" : "ADD"; ?>
            </button>
        </form>
    <?php endif; ?>
</div>

<?php } ?>
</main>
<?php
require base_path('views/includes/footer.php');