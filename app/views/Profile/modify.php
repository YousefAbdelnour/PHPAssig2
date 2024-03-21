<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Profile</title>
    <link href="/app/views/login.css" rel="stylesheet">

</head>

<body> <?php include('app/views/navbar.php'); ?>

    <h1>Edit Profile</h1>
    <form action="/Profile/modify" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo ($data->first_name); ?>">
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name" value="<?php echo ($data->middle_name); ?>">
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo ($data->last_name); ?>">
        <button type="submit">Update Profile</button>
    </form>
    <a href="/Profile/index">Cancel</a>
</body>

</html>