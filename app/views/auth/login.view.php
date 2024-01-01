<?php 

require base_path('views/includes/head.php');

?>
<main>

<div class="login-content">
    <h1>Login</h1>

    <form method="POST" action="/login">
        <div class="label-group">
            <label for="login-email">EMAIL</label>
            <input id="login-email" name="email" type="email" min="3" max="60" require>
        </div>

        <div class="label-group">
            <label for="login-password">PASSWORD</label>
            <input id="login-password" name="password" type="password" min="6" max="24" require>
        </div>

        <button type="submit">Login</button>
    </form>

    <p class="p">Don't have an account? Sign in <a href="/signup">here</a></p>
</div>

</main>
<?php
require base_path('views/includes/footer.php');