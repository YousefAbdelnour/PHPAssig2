<!--By: Rowan -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/app/views/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- bootstrap, makes the page better and responsive. Important to have in all views -->

</head>

<body>

    <!-- Nav bar -->
    <div class="navbar">
        <a href="/Publication/index">Home</a>
        <a href="/Publication/create">Messages</a>
        <a href="/Profile/modify">Profile</a>
    </div>

    <h1>Log In</h1>

    <!-- Login page -->
    <form method='post' action=''>
        <label for="username">First name:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Last name:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
        <a href='/User/register'>I have no account, bring me to the registration page</a>
        <div id="failed">
            <?php
            if ($data == false) {
                echo ("Retry failed, please try again");
            }
            ?>
        </div>
    </form>

</body>

</html>