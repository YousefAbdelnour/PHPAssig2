<?php

namespace app\models;

use PDO;

class User extends \app\core\Model //By: Rowan
{
    public $userId;
    public $username;
    public $passhash;
    public function create()
    {
        $SQL = 'INSERT INTO user(username, password_hash) 
        VALUE (:username, :password_hash)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'username' => $this->username,
            'password_hash' => $this->passhash,
        ]);
    }
    public function update()
    {

        $SQL = 'UPDATE user SET username=:username, password_hash=:password_hash
        WHERE user_id=:user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'user_id' => $this->userId,
                'username' => $this->username,
                'password_hash' => $this->passhash
            ]
        );
    }
    public function delete()
    {
        $SQL = 'DELETE FROM profile WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['user_id' => $this->userId]
        );
    }
    public function getById()
    {
        $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['user_id' => $this->userId]
        );
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\profile');
        return $STMT->fetch();
    }
    public function getByUsername()
    {
        $SQL = 'SELECT * FROM user WHERE username = :username';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['username' => $this->username]
        );
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\profile');
        return $STMT->fetch();
    }
}