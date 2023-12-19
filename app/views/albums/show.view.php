<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>

<h2><?= $data['0']['name']?></h2>

<div class="container">
    <p class="album_release_year"><?= $data['0']['release_year']?></p>
    <a href="/artists?artist_id=<?= $data['0']['artist_id']?>"><p class="album_artist_name"><?= $data['0']['artist_name']?></p></a>
    <a href="/albums/edit?album_id=<?= $data['0']['album_id'] ?>">Edit Album</a>
</div>

<?php

require base_path('views/includes/footer.php');