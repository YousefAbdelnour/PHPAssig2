<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Publications</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>

<body>
    <?php include('app/views/navbar.php'); ?>

    <h1>All Publications</h1>
    <?php foreach ($data as $publication) : ?>
        <div class="publication">
            <!-- Access data using array syntax -->
            <h2><?php echo ($publication->title); ?></h2>
            <p><?php echo ($publication->text); ?></p>
        </div>
    <?php endforeach; ?>
</body>

</html>