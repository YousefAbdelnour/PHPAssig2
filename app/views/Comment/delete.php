<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Comment</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Delete Comment</h1>
    <p>Are you sure you want to delete this comment?</p>
    <form action="/Comment/delete" method="POST">
        <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id; ?>">
        <button type="submit">Delete</button>
    </form>
</body>
</html>
