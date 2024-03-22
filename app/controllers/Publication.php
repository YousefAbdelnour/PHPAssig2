<?php

namespace app\controllers;

class Publication extends \app\core\Controller //by youssef
{
    public function index()
    {
        $commentModel = new \app\models\Comment();
        $publicationModel = new \app\models\Publication();
        $allPublications['publications'] = $publicationModel->getAll();
        $allPublications['comments'] = $commentModel->read();
        $this->view('Publication/index', $allPublications);
    }

    public function publication()
    {
        $commentModel = new \app\models\Comment();
        $publicationModel = new \app\models\Publication();
        $publicationModel->publication_id = $_GET['id'];
        $allPublications['publications'] = $publicationModel->getById();
        $allPublications['comments'] = $commentModel->read();
        $this->view('Publication/publication', $allPublications);
    }

    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication = new \app\models\Publication();
            $publication->profile_id = $_SESSION['profile_id'];
            $publication->publication_title = $_POST['title'];
            $publication->publication_text = $_POST['text'];
            $publication->timestamp = date('Y-m-d H:i:s');
            $publication->publication_status = $_POST['status'];
            $publication->create();
            header('location:/Publication/index');
            echo ($publication->profile_id);
            echo ($publication->publication_title);
            echo ($publication->publication_text);
            echo ($publication->timestamp);
            echo ($publication->publication_status);
        } else {
            $this->view('Publication/create');
        }
    }

    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    // #[\app\filters\OwnsPublication]
    public function edit()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $publication = new \app\models\Publication();
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->timestamp = date('Y-m-d H:i:s');
        $publication->publication_status = $_POST['status'];
        $publication->edit();
        header('location:/Publication/index');
    } else {
        $this->view('Publication/edit');
    }
    }


    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    // #[\app\filters\OwnsPublication]
    public function delete() // $publication_id is fetched from the URL
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $publication = new \app\models\Publication();
            $publication->publication_id = $_GET['id']; // Use the $publication_id from the URL
            $publication->delete();
            header('location:/Publication/index');
        }
    }


    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchQuery = $_GET['query'] ?? '';
            $publicationModel = new \app\models\Publication();
            $searchResults['publications'] = $publicationModel->searchPublications($searchQuery);
            // Assuming you don't need comments for the search results view
            $searchResults['comments'] = [];
            $this->view('Publication/search', $searchResults);
        }
    }

}
