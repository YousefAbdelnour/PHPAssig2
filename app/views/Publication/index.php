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
        <?php foreach ($allPublications as $publication) : ?>
            <div class="publication">
                <h2><?php echo $publication['title']; ?></h2>
                <p><?php echo $publication['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="/Publication/create" class="button">Create -></a>


</body>

</html>