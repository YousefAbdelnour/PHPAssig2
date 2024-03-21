<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Publication</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Delete Publication</h1>
    <p>Are you sure you want to delete this publication?</p>
    <form action="/Publication/delete" method="POST">
        <input type="hidden" name="publication_id" value="<?php echo $data->publication_id; ?>">
        <button type="submit">Delete</button>
    </form>
</body>
</html>
