<?php

namespace app\models;

use PDO;

class Comment extends \app\core\Model
{
    public $comment_id;
    public $comment_text;
    public $profile_id;
    public $publication_id;
    public $timestamp;

    public function create(){
        $SQL = 'INSERT INTO publication_comment(comment_text,profile_id,publication_id,timestamp)
        VALUE (:comment_text,:profile_id,:publication_id,:timestamp)' ;
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'comment_text' => $this->comment_text,
                'profile_id' => $this->profile_id,
                'publication_id' => $this->publication_id,
                'timestamp' => $this->timestamp
            ]
        );
    }

    public function read(){
        $SQL = 'SELECT * FROM publication_comment';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetchAll();
    }

    public function getByUser($profile_id){
        $SQL = 'SELECT * FROM publication_comment WHERE profile_id = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetchAll();
    }

    public function getByCommentID($comment_id){
        $SQL = 'SELECT * FROM publication_comment WHERE publication_comment_id = :comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['comment_id' => $comment_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetch();
    }

    public function getByPublication($publication_id){
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetchAll();
    }

    public function update(){
        $SQL = 'UPDATE publication_comment SET comment_text=:comment_text, timestamp=:timestamp WHERE publication_comment_id = :comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
            'comment_id' => $this->comment_id,  
            'comment_text' => $this->comment_text,
            'timestamp' => $this->timestamp
            ]
        );
    }

    public function delete(){
        $SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :commment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['commment_id' => $this->comment_id]);
    }

}