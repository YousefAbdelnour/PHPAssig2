<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Comment</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Delete Comment</h1>
    <p>Are you sure you want to delete this comment?</p>
    <form method="post" action="/Comment/delete">
        <input type="hidden" name="id" value="<?php echo $comment->publication_comment_id; ?>">
        <button type="submit" class="button">Delete Comment</button>
    </form>
</body>
</html>
