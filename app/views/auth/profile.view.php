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

</div>

</main>
<?php
require base_path('views/includes/footer.php');