<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publication</title>
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

    
    <form action="/Publication/edit" method="post">
    <!-- Validating ID --> 
    <input type="hidden" name="publication_id" value="<?php echo $publication['id']; ?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <!-- Using echo to put the title in the text field for editing --> 
        <input type="text" id="title" name="title" value="<?php echo $publication['title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="text">Text:</label>
        <textarea id="text" name="text" required><?php echo $publication['text']; ?></textarea>
    </div>
    <button type="submit">Update</button>
</form>



</body>
</html>