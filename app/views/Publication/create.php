<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Publication</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>
<body>
    <?php include('path/to/navbar.php'); ?>

    <h1>Create Publication</h1>
    <form action="/Publication/create" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="text">Text:</label>
        <textarea id="text" name="text" required></textarea>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="0">Private</option>
            <option value="1">Public</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
