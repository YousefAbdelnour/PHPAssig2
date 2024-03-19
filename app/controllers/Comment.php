<?php

namespace app\controllers;

use PDO;

#[\app\filters\HasProfile]
#[\app\filters\Login]
class Comment extends \app\core\Controller
{
    public function load($publication_id){
        $comment = new \app\models\Comment;
        return $comment->getByPublication($publication_id);
    }

    public function create(){
        if($_SERVER['REQUEST METHOD'] === 'POST' && isset($_POST['comment_text'])){
            $comment = new \app\models\Comment;
            $comment->comment_text = $_POST['comment_text'];
            $comment->profile_id = $_SESSION['user_id'];
            $comment->publication_id = $_POST['publication_id'];
            $comment->timestamp = date('Y-m-d H:i:s');
            $comment->create();
            header('location:/Publication/index');
        }
    }

    public function edit(){
        if($_SERVER['REQUEST METHOD'] === 'POST' && isset($_POST['edit_text'])){
            $comment = new \app\models\Comment;
            $comment->comment_text = $_POST['edit_text'];
            $comment->profile_id = $_SESSION['user_id'];
            $comment->publication_id = $_POST['publication_id'];
            $comment->timestamp = date('Y-m-d H:i:s');
            $comment->update();
            header('location:/Publication/index');
        }
    }

    public function delete(){
        if($_SERVER['REQUEST METHOD'] === 'POST'){
            $comment = new \app\models\Comment;
            $comment->comment_id = $_POST['comment_id'];
            $comment->delete();
            header('location:/Publication/index');
        }
    }

}