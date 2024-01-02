<div class="header-container">
    <div class="header-top">
        <a href="/"><h1 class="header-title">Music Collection</h1></a>
        <div class="user-options">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <a href="/profile">Profile</a>
                <a href="/logout">Logout</a>
            <?php else : ?>
                <a href="/login">Login</a>
                <a href="/signup">Signup</a>
            <?php endif; ?>
        </div>
    </div>
            <div class="header-nav">
                <ul>
                    <a href="/songs">
                        <li class="nav-item">Songs</li>
                    </a>
                    <a href="/artists">
                        <li class="nav-item">Artists</li>
                    </a>
                    <a href="/albums">
                        <li class="nav-item">Albums</li>
                    </a>
                </ul>
            </div>
</div>