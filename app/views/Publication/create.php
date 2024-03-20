<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Publication</title>
    <link href="/app/views/login.css" rel="stylesheet"> 
</head>
<body>
    
    <!-- Nav bar --> 
    <div class="navbar">
        <a href="/Publication/index">Home</a>
        <a href="/Profile/edit">Profile</a>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="/User/logout">Logout</a>
        <?php else : ?>
            <a href="/User/login">Login</a>
        <?php endif; ?>
    </div>

<!-- Publication Form -->
<div class="container">
    <h2>Create New Publication</h2>
    <form action="/Publication/create" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea id="text" name="text" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</div>

</body>
</html>
