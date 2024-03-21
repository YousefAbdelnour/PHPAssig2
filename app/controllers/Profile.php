<?php

namespace app\controllers;

#[\app\filters\Login]
class Profile extends \app\core\Controller
{
    #[\app\filters\HasProfile]
    public function index()
    {
        $profile = new \app\models\Profile();
        $publications = new \app\models\Publication();
        $comment = new \app\models\Comment();
        $profile = $profile->fetchProfile($_SESSION['user_id']);
        $_SESSION['profile_id'] = $profile->profile_id;
        $finalData['profile'] = $profile;
        $finalData['publications'] = $publications->getForOwner($profile->profile_id); //get all pubications related to the profile
        $finalData['comment'] = $comment->read(); //get all comments
        $this->view('Profile/index', $finalData);
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
            $profile->fetchProfile($_SESSION['user_id']);
            $_SESSION['profile_id'] = $profile->profile_id;
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
