<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<div class="main-title-banner">
    <h2>Profile</h2>
</div>

<div class="profile-content">
    <p>Name: <?= $_SESSION['user']['username']?></p>
    <p>Email Address: <?= $_SESSION['user']['email']?></p>
    <p>Date Created <?= $_SESSION['user']['date_created']?></p>
</div>

<div class="playlist-container">
    <?php if ($data) {
        foreach($data as $song) { ?>
        <div class="container">
        <a href="/song?song_id=<?= $song['song_id'] ?>"><h3 class="song_title"><?= $song['song_name']?></h5></a>
        <p class="song_length"><?= $song['length_seconds']?> Seconds</p>
        <a href="/artist?artist_id=<?= $song['artist_id'] ?>"><p class="song_artist_name"><?= $song['artist_name']?></p></a>
        <a <?= isset($song['album_id']) ? 'href="album?album_id=' . $song['album_id'] . '"' : 'disabled'; ?>><p><?= $song['album_name'] ?? ''; ?></p></a>
    
        <form action="playlist/update" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="song_id" value="<?= $song['song_id']?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id']?>">
            <input type="hidden" name="url" value="/profile">
            <button type="submit">REMOVE</button>
        </form>
    <?php  } } ?>
</div>

</main>
<?php
require base_path('views/includes/footer.php');