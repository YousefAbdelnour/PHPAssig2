<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>

<!-- Include your navigation bar here -->
<?php include('app/views/navbar.php'); ?>

<h1>Search Results</h1>

<div class="publications">
    <?php if (!empty($data['publications'])): ?>
        <?php foreach ($data['publications'] as $publication): ?>
            <div class="publication">
                <h2><?php echo "<a href='/Publication/publication?id=$publication->publication_id'>$publication->publication_title</a>"; ?></h2>
                <p><?php echo $publication->publication_text; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No publications found matching your search criteria.</p>
    <?php endif; ?>
</div>

</body>
</html>
