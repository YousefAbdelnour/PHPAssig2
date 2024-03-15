<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/app/views/login.css" rel="stylesheet"> 

</head>
<body>
    
    <!-- Nav bar --> 
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Messages</a>
        <a href="#">Profile</a>
    </div>

    <h1>Creation Page</h1>

    <!-- Create page -->
    <form action="/app/controllers/User.php" method="post">
        <label for="username">First name:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Last name:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>


</body>
</html>