<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

$artist = $data['0'];

?>

<main>
<h2>Edit Artist</h2>

<form id="editForm" action="/artists/update" method="POST">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="artist_id" value=<?= $artist['artist_id'] ?> >

    <div class="label-group">
        <label for="artist_name">ARTIST NAME</label>
        <input id="artist_name" type="text" name="artist_name" value="<?= $artist['name']?>" >
    </div>

    <div class="label-group">
        <label for="artist_birthdate">ARTIST BIRTHDATE</label>
        <input id="artist_birthdate" type="date" name="artist_birthdate" value=<?= $artist['birthdate']?> >
    </div>

</form>

<div class="button-area">
    <button form="editForm">Update Artist</button>
    <form action="/artists/destroy" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="artist_id" value="<?php echo $artist['artist_id']; ?>" >
        <button >Delete Artist</button>
    </form>
</div>

</main>
<?php

require base_path('views/includes/footer.php');