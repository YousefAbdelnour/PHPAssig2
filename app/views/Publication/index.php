<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link href="/app/views/login.css" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            font-size: 18px; /* Set the base font size */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            width: 100%; /* Make the content take up the entire width of the screen */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Styles for publications */
        .publication {
            width: 90%; /* Set the width of the publication */
            margin: 20px auto; /* Center the publication and add space between them */
            padding: 20px; /* Add padding to the publication */
            background-color: #f9f9f9; /* Set the background color */
            border: 1px solid #ccc; /* Add border */
            text-align: center; /* Center align text */
        }

        /* Styles for buttons */
        .button {
            display: inline-block;
            padding: 10px 20px;
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

        /* Styles for comments */
        .comment {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            text-align: center; /* Center align text */
        }
    </style>
</head>
<body>
    <!-- Nav bar -->
    <?php include('app/views/navbar.php'); ?>

    <form action="/Publication/search" method="get">
        <input type="text" name="query" placeholder="Search publications...">
        <button type="submit" class="button">Search</button>
    </form>

    <h1>Publication Home</h1>

    <div class="publications">
    <?php foreach ($data['publications'] as $publication) : ?>
        <div class="publication">
            <h1>Publication:</h1>
            <h2><?php echo "<a href='/Publication/publication?id=$publication->publication_id'>$publication->publication_title</a>"; ?></h2>
            <p><?php echo $publication->publication_text; ?></p>
            <?php echo "<a href='/Publication/delete?id=$publication->publication_id' class='button'>Delete</a>"; ?>
            <?php echo "<a href='/Publication/edit?id=$publication->publication_id' class='button'>Edit</a>"; ?> <!-- Add Edit button -->
            <?php echo "<a href='/Comment/create?id=$publication->publication_id' class='button'>Comment</a>"; ?>
            <h3>Comments:</h3>
            <?php foreach ($data['comments'] as $comment) : ?>
                <?php if ($comment->publication_id == $publication->publication_id) : ?>
                    <div class="comment">
                        <p><?php echo $comment->comment_text; ?></p>
                        <form method="post" action="/Comment/delete">
                            <input type="hidden" name="id" value="<?php echo $comment->publication_comment_id; ?>">
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
