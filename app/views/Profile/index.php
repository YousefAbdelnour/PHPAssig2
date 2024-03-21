<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="/app/views/login.css" rel="stylesheet">
    <style>
        .comment {
    margin-top: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
}

/* Styling for buttons */
.button {
    display: inline-block;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    background-color: gray;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.button:hover {
    background-color: #0056b3;
}

.publication {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}
.comment {
        margin-top: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
    }

    /* Styling for buttons */
    .button, .a {
        display: inline-block;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        background-color: gray;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }

    .button:hover {
        background-color: #0056b3;
    }

    </style>
</head>
<body>    
    <?php include('app/views/navbar.php'); ?>

    <h1>Profile Information</h1>
    <p><strong>First Name:</strong> <?php echo ($data['profile']->first_name); ?></p>
    <p><strong>Middle Name:</strong> <?php echo ($data['profile']->middle_name); ?></p>
    <p><strong>Last Name:</strong> <?php echo ($data['profile']->last_name); ?></p>

    <a href="/Profile/modify">Edit Profile</a>

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

    
</body>
</html>
