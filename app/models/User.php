<?php 

use PDO;

class User extends \app\core\Model //By: Rowan
{

    public $userId; 
    public $username; 
    public $passhash; 

    //create method creates a new user in the database. 
    public function create()
    {
        $SQL = 'INSERT INTO user(userId,username,passhash); 
        VALUE (:userId,:username,:passhash)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            [
                'userId' => $this->userId,
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

?> 


