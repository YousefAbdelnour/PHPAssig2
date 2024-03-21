<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link href="/app/views/login.css" rel="stylesheet">
    <style>
        .publication {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>



    <!-- Nav bar -->
    <?php include('app/views/navbar.php'); ?>



    <h1>Publication Home</h1>

    <!-- Using a foreach loop to display each publications along with a delete button 
    that attaches itself to each individual publication -->

    <!-- DEBUG NOTE: Didn't add status to it because I wasn't sure what it did -->
    <div class="publications">
        <?php foreach ($data['publications'] as $publication) : ?>
            <div class="publication">
                <h2><?php echo $publication->publication_title; ?></h2>
                <p><?php echo $publication->publication_text; ?></p>
                <?php echo "<a href='/Publication/delete?id=$publication->publication_id' class='button'>Delete</a>
                <a href='/Comment/create?id=$publication->publication_id' class='button'>Comment</a>";?>

                <!-- Display comments for this publication -->
                <?php foreach ($data['comments'] as $comment) : ?>
                    <?php if ($comment->publication_id == $publication->publication_id) : ?>
                        <div class="comment">
                            <p><?php echo $comment->comment_text; ?></p>
                            <!-- Optional: Add a delete link for the comment if needed -->
                            <?php echo "<a href='/Comment/delete?id=$comment->publication_comment_id' class='button'>Delete</a>";?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>


    <a href="/Publication/create" class="button">Create -></a>



</body>


</html>