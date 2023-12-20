<?php 

require base_path('views/includes/head.php');
require base_path('views/includes/header.php');

?>
<main>

<h2>Add an Artist</h2>
<form action="/artists/store" method="POST">
    <div class="label-group">
        <label for="artist_name">ARTIST NAME</label>
        <input type="text" name="artist_name" id="artist_name" required>
    </div>
    <div class="label-group">
        <label for="artist_birthdate">ARTIST BIRTHDATE</label>
        <input type="date" name="artist_birthdate" id="artist_birthdate" required>
    </div>
    <button>Add Artist</button>
</form>

</main>
<?php

require base_path('views/includes/footer.php');