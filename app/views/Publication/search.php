<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="/app/views/login.css" rel="stylesheet">
</head>
<body>

<?php include('app/views/navbar.php'); ?>


    <h1>Search Results</h1>

    <?php if (!empty($publications)): ?>
        <div class="publications">
            <?php foreach ($publications as $publication): ?>
                <div class="publication">
                    <h2><?php echo "<a href='/Publication/publication?id=$publication->publication_id'>$publication->publication_title</a>"; ?></h2>
                    <p><?php echo $publication->publication_text; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No publications found matching your search criteria.</p>
    <?php endif; ?>




</body>
</html>
