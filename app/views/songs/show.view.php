<?php 
// dd($data['0']);
require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>


<div class="container">
    <h3><?= $data['0']['name']?></h3>
    <p class="song_length"><?= $data['0']['length_seconds']?> Seconds</p>
    <a href="/artist?artist_id=<?= $data['0']['artist_id'] ?>"><p class="song_artist_name"><?= $data['0']['artist_name']?></p></a>
    <a <?= isset($data['0']['album_id']) ? 'href="album?album_id=' . $data['0']['album_id'] . '"' : 'disabled'; ?>><p><?= $data['0']['album_name'] ?? ''; ?></p></a>
</div>
<a class="buttonref" href="/songs/edit?song_id=<?= $data['0']['song_id'] ?>">Edit Album</a>

</main>
<?php

require base_path('views/includes/footer.php');