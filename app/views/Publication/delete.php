<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Publication</title>
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
    
    <div class="publications">
    <?php foreach ($allPublications as $publication): ?>
        <div class="publication">
            <h2><?php echo $publication['title']; ?></h2>
            <p><?php echo $publication['content']; ?></p>
            <!-- Delete button -->
            <form action="/Publication/delete" method="post">
                <input type="hidden" name="publication_id" value="<?php echo $publication['id']; ?>">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this publication?')">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
    </div>



</body>
</html>