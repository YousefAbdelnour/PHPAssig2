<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link href="/app/views/login.css" rel="stylesheet">
    <style>
        /* Define CSS for publication divs */
        .publication {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>



    <!-- Nav bar -->
    <div class="navbar">
        <a href="/Publication/index">Home</a>
        <a href="/Profile/edit">Profile</a>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="/User/logout">Logout</a>
        <?php else : ?>
            <a href="/User/login">Login</a>
        <?php endif; ?>
    </div>


    <h1>Publication Home</h1>

    <!-- Using a foreach loop to display each publications along with a delete button 
    that attaches itself to each individual publication -->

    <!-- DEBUG NOTE: Didn't add status to it because I wasn't sure what it did -->
    <div class="publications">
        <?php foreach ($data['publications'] as $publication) : ?>
            <div class="publication">
                <h2><?php echo $publication->publication_title; ?></h2>
                <p><?php echo $publication->publication_text; ?></p>
                <a href="/Publication/delete/<?php echo $publication->publication_id; ?>" class="button">Delete</a>
                <a href="/Comment/create/<?php echo $publication->publication_id; ?>" class="button">Comment</a>

                <!-- Display comments for this publication -->
                <?php foreach ($data['comments'] as $comment) : ?>
                    <?php if ($comment->publication_id == $publication->publication_id) : ?>
                        <div class="comment">
                            <p><?php echo $comment->comment_text; ?></p>
                            <!-- Optional: Add a delete link for the comment if needed -->
                            <a href="/Comment/delete/<?php echo $comment->comment_id; ?>" class="button">Delete Comment</a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>


    <a href="/Publication/create" class="button">Create -></a>



</body>


</html>