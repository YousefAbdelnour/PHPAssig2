<?php

namespace app\controllers;

class User extends \app\core\Controller
{
    public function register()
    {
        echo ('inside register function');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create an instance of the User class
            $user = new \app\models\User();

            $user->username = $_POST['username'];
            // Hashing the password 
            $user->passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user->create();

            header('location:/Profile/create'); //when user is created, profile needs to be created
        } else {
            $this->view('User/register'); //goes to user registration page
        }
    }
    //changed name to facilitate routes -youssef
    public function login() //?? make the login logic here, when you call the model its for crud operation
    // (in this case use the read function and then verify here not there, its more optimal and good practice.)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //log the user in... if the password is right
            //get the user from the database
            $username = $_POST['username'];
            $user = new \app\models\User();
            $user->username = $username;
            $user = $user->getByUsername();
            //check the password against the hash
            $password = $_POST['password'];
            if ($user && password_verify($password, $user->password_hash)) {
                //remember that this is the user logging in...
                $_SESSION['user_id'] = $user->user_id;
                $profile = new \app\models\Profile();
                $profile = $profile->fetchProfile($user->user_id);
                $_SESSION['profile_id'] = $profile->profile_id;
                header('location:/Profile/index');
            } else {
                header('location:/User/login', false);
            }
        } else {
            $this->view('User/login', true);
        }
    }

    public function logout()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // Unset the user session variable
            unset($_SESSION['user_id']);
        }
        // Destroy all session data
        session_destroy();
        // Redirect to the login page
        header('location:/User/login');
    } else {
        // If the request method is not POST, redirect to the login page
        header('location:/User/login');
    }
}

}