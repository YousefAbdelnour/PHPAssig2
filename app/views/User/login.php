<!--By: Rowan --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/app/views/login.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> 
    <!-- bootstrap, makes the page better and responsive. Important to have in all views -->

</head>
<body>
    
    <!-- Nav bar --> 
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Messages</a>
        <a href="Profile/modify">Profile</a>
    </div>

    <h1>Log In</h1> 

    <!-- Login page -->
    <form action="/app/controllers/User.php" method="post">
        <label for="username">First name:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Last name:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>


</body>
</html>


