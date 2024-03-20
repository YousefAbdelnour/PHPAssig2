<nav class="navbar">
    <a href="/Publication/index">Home</a>
    <a href="/Profile/index">Profile</a>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/User/logout">Logout</a>
    <?php else: ?>
        <a href="/User/login">Login</a>
    <?php endif; ?>
</nav>
