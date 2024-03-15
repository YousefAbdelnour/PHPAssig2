<?php 

namespace app\models;

use PDO;

class User extends \app\core\Model //By: Rowan
{// implement all the crud operations here (create read update delete) and the login logic is in the controller

    //all good, look at my comments and youre good, rest is perfect

    public $userId; 
    public $username; 
    public $passhash; 

    //create method creates a new user in the database. 
    public function create()
    {// removed userid from being inserted because it is auto incremented in the database so no need to even define it.
        // field is there when the class is fetched from the database not vice versa
        $SQL = 'INSERT INTO user(username,passhash); 
        VALUE (:username,:passhash)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'username' => $this->username,
                'pass' => $this->passhash,
            ]
        );
    }

    public function login()
    {
        //check if username and password are provided
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            return false;
        }

        //creates two different variables for the username and password comparison 
        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];

        //select statement to see that the username exists 
        $sql = "SELECT * FROM user WHERE username = :username";
        // connects and prepares the statement written above 
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['username' => $enteredUsername]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //checks if user exists and password matches the hashed password stored in the system 
        if ($user && password_verify($enteredPassword, $user['passhash'])) {
            return true;
        } else {
            //if the if statement isn't triggered, it means the password isn't recognized
            return false;
        }
    }



}