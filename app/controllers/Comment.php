<?php

namespace app\controllers;

class Comment extends \app\core\Controller
{
    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    public function create() // $publication_id is fetched from the URL
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new \app\models\Comment();
            $comment->comment_text = $_POST['comment_text'];
            $comment->profile_id = $_SESSION['profile_id'];
            $comment->publication_id = $_GET['id']; // Use the $publication_id from the URL
            $comment->timestamp = date('Y-m-d H:i:s');
            $comment->create();
            header('location:/Publication/index');
        } else {
            $this->view('Comment/create');
        }
    }


    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    public function edit()
    {
        $comment = new \app\models\Comment();
        $comment->publication_comment_id = $_GET['id'];
        $comment = $comment->getByCommentID();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new \app\models\Comment();
            $comment->publication_comment_id = $_GET['id'];
            $comment = $comment->getByCommentID();
            $comment->comment_text = $_POST['edit_text'];
            $comment->timestamp = date('Y-m-d H:i:s');
            $comment->edit();
            header('location:/Publication/index');
        } else {
            $this->view('Comment/edit', $comment);
        }
    }

    #[\app\filters\OwnsComment]
    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $comment_id = $_POST['id'];

            $comment = new \app\models\Comment;

            $comment->publication_comment_id = $comment_id;

            $comment->delete();


            header('Location: /Publication/index');
            exit();
        } else {
            header('Location: /error');
            exit();
        }
    }
}
