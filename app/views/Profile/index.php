<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>
<body>    <?php include('app/views/navbar.php'); ?>

    <h1>Profile Information</h1>
    <p><strong>First Name:</strong> <?php echo ($data->first_name); ?></p>
    <p><strong>Middle Name:</strong> <?php echo ($data->middle_name); ?></p>
    <p><strong>Last Name:</strong> <?php echo ($data->last_name); ?></p>
    <a href="/Profile/modify">Edit Profile</a>
</body>
</html>
