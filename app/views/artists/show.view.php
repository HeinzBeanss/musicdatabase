<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<div class="container">
    <h3><?= $data->artist_name?></h3>
    <p class="artist_birthdate"><?= $data->artist_birthdate?></p>

    <?php
    foreach($data->albums as $album) {
    ?>
        <div class="artist_album_container">
            <a href="/album?album_id=<?= $album->album_id?>"><p class="artist_album_name"><?= $album->album_name?></p></a>
            <p class="artist_album_release_year"><?= $album->album_release_year?></p>
        </div>   
    <?php } ?>
</div>
<a class="buttonref" href="/artists/edit?artist_id=<?= $data->artist_id ?>">Edit Artist</a>
</main>
<?php

require base_path('views/includes/footer.php');