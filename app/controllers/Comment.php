<?php

namespace app\controllers;

class Comment extends \app\core\Controller
{
    #[\app\filters\HasProfile]
    #[\app\filters\Login]
    public function create() // $publication_id is fetched from the URL
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_text'])) {
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


    // #[\app\filters\OwnsComment]
    public function edit()
    {
        if ($_SERVER['REQUEST METHOD'] === 'POST' && isset($_POST['edit_text'])) {
            $comment = new \app\models\Comment;
            $comment->comment_text = $_POST['edit_text'];
            $comment->profile_id = $_SESSION['user_id'];
            $comment->publication_id = $_POST['publication_id'];
            $comment->timestamp = date('Y-m-d H:i:s');
            $comment->update();
            header('location:/Publication/index');
        } else {
            $this->view('Comment/edit');
        }
    }

    // #[\app\filters\OwnsComment]
    public function delete()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming the comment ID is sent via POST
        $comment_id = $_POST['id'];
        
        // Create a new comment instance
        $comment = new \app\models\Comment;
        
        // Set the comment ID
        $comment->publication_comment_id = $comment_id;
        
        // Call the delete method on the comment instance
        $comment->delete();
        
        // Redirect to an appropriate location after deletion
        header('Location: /Publication/index'); // Redirect to the publication list, adjust as needed
        exit();
    } else {
        // If the request is not a POST request, redirect to an error page or another appropriate action
        header('Location: /error'); // Adjust the URL as needed
        exit();
    }
}

}
