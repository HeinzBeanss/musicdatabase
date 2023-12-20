<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<div class="main-title-banner">
    <h2>Album Collection</h2>
    <a class="buttonref" href="/albums/create">Add Album</a>
</div>

<?php
foreach ($data as $album) {

?>

<div class="container">
    <a href="/album?album_id=<?= $album['album_id'] ?>"><h3 class="album_title"><?= $album['name']?></h5></a>
    <p class="album_release_year"><?= $album['release_year']?></p>
    <a href="/artist?artist_id=<?= $album['artist_id'] ?>"><p class="album_artist_name"><?= $album['artist_name']?></p></a>

</div>

<?php } ?>
</main>
<?php
require base_path('views/includes/footer.php');