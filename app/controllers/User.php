<?php

namespace app\controllers;

// Import the User class from the models namespace
use app\models\User;

class UserController extends \app\core\Controller { //By: Rowan 

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create an instance of the User class
            $user = new User();

            $user->userId = $_POST['userId'];
            $user->username = $_POST['username'];
            // Hashing the password 
            $user->passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $user->create();
            
        } else {
            echo "Something went wrong in registration"; 
        }
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create an instance of the User class
            $user = new User();
            if ($user->login()) {
                //if the log in is successful it redirects to the index page of publication 
                header('Location: /app/views/Publication/index.php');
                exit; // Exit after redirect
            }  
        } else {
            echo "Authentication Failed";
        }
    }
}
