<?php

namespace app\controllers;

// Import the User class from the models namespace
//removed the use line to allow class to be called User only for the routes to work -youssef
class User extends \app\core\Controller
{ //By: Rowan 

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create an instance of the User class
            $user = new \app\models\User();

            $user->userId = $_POST['userId'];
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
            // Create an instance of the User class
            $user = new \app\models\User();
            if ($user->login()) {
                //if the log in is successful it redirects to the index page of publication 
                header('Location:/Publication/index'); //dont put the whole path or .php, it doesnt work
            } else {
                $this->view('User/login', false); //to display login failed message with an if statement
            }
        } else {
            $this->view('User/login', true); //not yet tried to login so true
        }
    }
}
