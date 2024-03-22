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
    <?php var_dump($data); ?>
    <h1>Edit Comment</h1>
    <form action="/Comment/edit?id=<?php echo $data->publication_comment_id; ?>" method="POST">
        <label for="edit_text">Comment:</label>
        <textarea id="edit_text" name="edit_text" required><?php echo ($data->comment_text); ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>

</html>