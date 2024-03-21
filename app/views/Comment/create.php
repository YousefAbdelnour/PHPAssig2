<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Comment</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Create Comment</h1>
    <form action="" method="POST">
        <label for="comment_text">Comment:</label>
        <textarea id="comment_text" name="comment_text" required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
