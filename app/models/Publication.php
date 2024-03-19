<?php

namespace app\models;

use PDO;

class Publication extends \app\core\Model
{
    public $id;
    public $profile_id;
    public $title;
    public $text;
    public $timestamp;
    public $status;

    public function create()
    {
        $SQL = 'INSERT INTO publication(profile_id,publication_title,publication_text,timestamp,publication_status)
        VALUE (:profile_id,:publication_title,:publication_text,:timestamp,:publication_status)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'profile_id' => $this->profile_id,
                'publication_title' => $this->title,
                'publication_text' => $this->text,
                'timestamp' => $this->timestamp,
                'publication_status' => $this->status
            ]
        );
    }
    public function getById()
    {
        $SQL = 'SELECT * FROM publication WHERE publication_status 
        = :publication_status AND publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_status' => true,
            'publication_id' => $this->id
        ]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
    public function getAll()
    {
        $SQL = 'SELECT * FROM publication WHERE publication_status = :publication_status';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_status' => true]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
    public function getByTitle($pTitle)
    {
        $SQL = 'SELECT * FROM publication WHERE publication_title = :publication_title AND publication_status = :publication_status';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'publication_title' => $pTitle,
                'publication_status' => true
            ]
        );
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
    public function getByContent($pContent)
    {
        $SQL = 'SELECT * FROM publication WHERE publication_text = :publication_text AND publication_status = :publication_status';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'publication_text' => $pContent,
                'publication_status' => true
            ]
        );
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
    public function getForOwner()
    {
        $SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $this->profile_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function getByPublication(){
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $this->id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetchAll();
    }

    public function edit()
    {
        $SQL = 'UPDATE publication SET publication_title=:publication_title,
        timestamp=:timestamp,
        publication_status=:publication_status,
        publication_text=:publication_text 
        WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'publication_id' => $this->id,
                'publication_title' => $this->title,
                'timestamp' => $this->timestamp,
                'publication_status' => $this->status,
                'publication_text' => $this->text
            ]
        );
    }
    public function delete()
    {
        $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['publication_id' => $this->id]
        );
    }
}
