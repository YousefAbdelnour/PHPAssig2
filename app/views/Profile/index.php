<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="/app/views/login.css" rel="stylesheet">

</head>
<body>    <?php include('app/views/navbar.php'); ?>

    <h1>Profile Information</h1>
    <p><strong>First Name:</strong> <?php echo ($data['profile']->first_name); ?></p>
    <p><strong>Middle Name:</strong> <?php echo ($data['profile']->middle_name); ?></p>
    <p><strong>Last Name:</strong> <?php echo ($data['profile']->last_name); ?></p>

    <div class="publications">
        <?php foreach ($data['publications'] as $publication) : ?>
            <div class="publication">
                <h2><?php echo $publication->publication_title; ?></h2>
                <p><?php echo $publication->publication_text; ?></p>
                <?php echo "<a href='/Publication/delete?id=$publication->publication_id' class='button'>Delete</a>";?>

                <!-- Display comments for this publication -->
                <?php foreach ($data['comment'] as $comment) : ?>
                    <?php if ($comment->publication_id == $publication->publication_id) : ?>
                        <div class="comment">
                            <p><?php echo $comment->comment_text; ?></p>
                            <!-- Optional: Add a delete link for the comment if needed -->
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>

    <a href="/Profile/modify">Edit Profile</a>
</body>
</html>
