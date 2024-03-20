<?php

namespace app\filters;

#[\Attribute]
class OwnsComment implements \app\core\AccessFilter
{
    public function redirected()
    {
        $commentId = $_REQUEST['comment_id'] ?? null;
        $profile = (new \app\models\Profile())->fetchProfile($_SESSION['user_id']);
        $commentModel = new \app\models\Comment();
        $comment = $commentModel->getByCommentID($commentId);
        if ($comment === null || $comment->profile_id != $profile->profile_id) {
            header('location:/Error/commentNotOwned');
            return true;
        }
        return false;
    }
}
