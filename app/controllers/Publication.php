<?php

namespace app\controllers;
class Publication extends \app\core\Controller //by youssef
{
    public function index()
    {
        $publicationModel = new \app\models\Publication();
        $allPublications = $publicationModel->getAll();
        $this->view('Publication/index', ['allPublications' => $allPublications]);
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication = new \app\models\Publication();
            $publication->profile_id = $_SESSION['profile_id'];
            $publication->title = $_POST['title'];
            $publication->text = $_POST['text'];
            $publication->timestamp = date('Y-m-d H:i:s');
            $publication->status = $_POST['status'];
            $publication->create();
            header('location:/Publication/index');
        } else {
            $this->view('Profile/create');
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication = new \app\models\Publication();
            $publication->title = $_POST['title'];
            $publication->text = $_POST['text'];
            $publication->timestamp = date('Y-m-d H:i:s');
            $publication->status = $_POST['status'];
            $publication->edit();
            header('location:/Publication/index');
        } else {
            $this->view('Profile/edit');
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication = new \app\models\Publication();
            $publication->id = $_POST['publication_id'];
            $publication->delete();
            header('location:/Publication/index');
        } else {
            $this->view('Profile/delete');
        }
    }
}
