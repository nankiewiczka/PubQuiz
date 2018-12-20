<?php

require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(
        string $login
    ) {
        try {
            $statement_to_retrieve_user =
                'SELECT * FROM Users 
                  RIGHT JOIN User_details 
                  ON Users.user_detail = User_details.id_user_detail 
                  WHERE login = :login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user)
                return new User($user['name'], $user['surname'], $user['email'], $user['login'], $user['password']);
            else
                return null;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}