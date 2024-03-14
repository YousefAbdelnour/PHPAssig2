<?php

namespace app\models;

use PDO;

class Profile extends \app\core\Model
{
    public $id;
    public $user_id;
    public $first_name;
    public $middle_name;
    public $last_name;

    public function insert()
    {
        $SQL = 'INSERT INTO profile(user_id,first_name,middle_name,last_name) 
        VALUE (:user_id,:first_name,:middle_name,:last_name)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'user_id' => $this->user_id,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name
            ]
        );
    }
    public function fetchProfile($user_id)
    {
        $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['user_id' => $user_id]
        );
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\profile');
        return $STMT->fetch();
    }
    public function update()
    {
        $SQL = 'UPDATE profile SET first_name=:first_name,middle_name=:middle_name,last_name=:last_name WHERE profile_id = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'profile_id' => $this->id,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name
            ]
        );
    }
}
