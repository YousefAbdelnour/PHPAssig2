<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Publication</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>Modify Publication</h1>
    <form action="/Publication/edit" method="POST">
    <input type="hidden" name="publication_id" value="<?php echo $data['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" required>
    <label for="text">Text:</label>
    <textarea id="text" name="text" required><?php echo htmlspecialchars($data['text']); ?></textarea>
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="1" <?php echo $data['status'] ? 'selected' : ''; ?>>Active</option>
        <option value="0" <?php echo !$data['status'] ? 'selected' : ''; ?>>Inactive</option>
    </select>
    <button type="submit">Update</button>
</form>



</body>
</html>
