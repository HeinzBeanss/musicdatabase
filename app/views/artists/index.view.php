<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<div class="main-title-banner">
    <h2>Artist Collection</h2>
    <a class="buttonref" href="/artists/create">Add Artist</a>
</div>

<?php
foreach($data as $artist) {
?>

<div class="container">

</div>
    <a href="/artist?artist_id=<?= $artist->artist_id?>"><h3 class="artist_title"><?= $artist->artist_name?></h3></a>
    <p class="artist_birthdate"><?= $artist->artist_birthdate?></p>
    
    <p class="artist_albums">Albums:</p>

    <?php
    foreach($artist->albums as $album) {
    ?>
        <div class="artist_album_container">
            <a href="/album?album_id=<?= $album->album_id?>"><p class="artist_album_name"><?= $album->album_name?></p></a>
            <p class="artist_album_release_year"><?= $album->album_release_year?></p>
        </div>   
    <?php 
        } 
    }
    ?>

<?php
require base_path('views/includes/footer.php');