<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link href="/app/views/login.css" rel="stylesheet">

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


    <h1>Profile Creation Page</h1>

    <!-- Create page -->
    <form action='/Profile/create' method="post">
        <label for="firstName">First name:</label><br>
        <input type="text" id="firstName" name="firstName"><br>
        <label for="middleName">Middle name:</label><br>
        <input type="text" id="middleName" name="middleName"><br>
        <label for="lastName">Last name:</label><br>
        <input type="text" id="lastName" name="lastName">
        <input type="submit">
    </form>


</body>

</html>