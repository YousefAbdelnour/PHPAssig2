<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Edit Comment</h1>
    <form action="/Comment/edit" method="POST">
        <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id; ?>">
        <label for="edit_text">Comment:</label>
        <textarea id="edit_text" name="edit_text" required><?php echo htmlspecialchars($comment->comment_text); ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
