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
    <?php var_dump($data); ?>
    <h1>Modify Publication</h1>
    <form action="/Publication/edit?id=<?php echo $data->publication_id; ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($data->publication_title); ?>" required>
        <label for="text">Text:</label>
        <textarea id="text" name="text" required><?php echo htmlspecialchars($data->publication_text); ?></textarea>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="1" <?php echo "$data->publication_status ? 'selected' : ''"; ?>>Active</option>
            <option value="0" <?php echo "$data->publication_status ? 'selected' : ''"; ?>>Inactive</option>
        </select>
        <button type="submit">Update</button>
    </form>



</body>

</html>