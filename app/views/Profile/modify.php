<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Modify</title>
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

    <!-- Create page -->
    <!-- Edit page -->
    <form action='/Profile/edit' method="post">
        <?php if ($profile): ?>
            <input type="hidden" name="profile_id" value="<?php echo $profile['profile_id']; ?>">
            <label for="firstName">First name:</label><br>
            <input type="text" id="firstName" name="firstName" value="<?php echo $profile['first_name']; ?>"><br>
            <label for="middleName">Middle name:</label><br>
            <input type="text" id="middleName" name="middleName" value="<?php echo $profile['middle_name']; ?>"><br>
            <label for="lastName">Last name:</label><br>
            <input type="text" id="lastName" name="lastName" value="<?php echo $profile['last_name']; ?>">
            <input type="submit" value="Update">
        <?php else: ?>
            <p>No profile found.</p>
        <?php endif; ?>
    </form>



</body>
</html>