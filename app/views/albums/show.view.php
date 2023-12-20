<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>


<div class="container">
    <h3><?= $data['0']['name']?></h3>
    <p class="album_release_year"><?= $data['0']['release_year']?></p>
    <a href="/artist?artist_id=<?= $data['0']['artist_id']?>"><p class="album_artist_name"><?= $data['0']['artist_name']?></p></a>
</div>
<a class="buttonref" href="/albums/edit?album_id=<?= $data['0']['album_id'] ?>">Edit Album</a>
</main>
<?php

require base_path('views/includes/footer.php');