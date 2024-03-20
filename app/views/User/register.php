<!--By: Rowan --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/app/views/login.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> 
    <!-- bootstrap, makes the page better and responsive. Important to have in all views -->

</head>
<body>
    
    <!-- Nav bar --> 
    <div class="navbar">
        <a href="/Publication/index">Home</a>
        <a href="/Profile/edit">Profile</a>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="/User/login">Login</a>
        <?php endif; ?>
    </div>

    <h1>Log In</h1> 

    <!-- Registration page -->
    <form action="/User/register" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Pasword:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>


</body>
</html>