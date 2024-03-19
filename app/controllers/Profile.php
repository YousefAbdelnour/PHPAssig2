<?php

namespace app\controllers;

#[\app\filters\Login]
class Profile extends \app\core\Controller
{
    #[\app\filters\HasProfile]
    public function index()
    {
        $profile = new \app\models\Profile();
        $profile = $profile->fetchProfile($_SESSION['user_id']);
        $this->view('Profile/index', $profile);
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile = new \app\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['firstName'];
            $profile->middle_name = $_POST['middleName'];
            $profile->last_name = $_POST['lastName'];
            $profile->insert();
            header('location:/Profile/index');
        } else {
            $this->view('Profile/create');
        }
    }
    #[\app\filters\HasProfile]
    public function modify()
    {
        $profile = new \app\models\Profile();
        $profile = $profile->fetchProfile($_SESSION['user_id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile->first_name = $_POST['first_name'];
            $profile->middle_name = $_POST['middle_name'];
            $profile->last_name = $_POST['last_name'];
            $profile->update();
            header('location:/Profile/index');
        } else {
            $this->view('Profile/modify', $profile);
        }
    }
}
