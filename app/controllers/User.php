<?php

class UserController extends \app\core\Controller { //By: Rowan 


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();

            $user->userId = $_POST['userId'];
            $user->username = $_POST['username'];
            //hasing the password 
            $user->passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $user->create();
            
            } else {
                echo "Something went wrong in registration"; 
            }
    }

    public function authenticate()
    {
        // Example: Handling user login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            if ($user->login()) {
                //if the log in is successful it redirects to the index page of publication 
                header('Location: /app/views/Publication/index.php');
            
            }  
        } else {
            echo "Authenticaton Failed";
        }
    }
}
