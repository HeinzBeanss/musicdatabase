<?php 

require base_path('views/includes/head.php');

?>
<main>

<div class="signup-content">
    <h1>Signup</h1>

    <form method="POST" action="/signup">

        <div class="label-group">
            <label for="signup-username">USERNAME</label>
            <input id="signup-username" name="username" type="text" min="4" max="30" required >
        </div>

        <div class="label-group">
            <label for="signup-email">EMAIL</label>
            <input id="signup-email" name="email" type="email" min="3" max="60" required >
        </div>

        <div class="label-group">
            <label for="signup-password">PASSWORD</label>
            <input id="signup-password" name="password" type="password" min="6" max="24" required >
        </div>

        <div class="label-group">
            <label for="signup-password-two">PASSWORD</label>
            <input id="signup-password-two" name="password_two" type="password" min="6" max="24" required >
        </div>

        <button type="submit">Signup</button>
    </form>

    <p class="">Already have an account? Login <a href="/login">here</a></p>
</div>

</main>
<?php
require base_path('views/includes/footer.php');