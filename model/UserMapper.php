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

    public function getUser (string $login) {
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

    public function addUser(User $user) {
        try {
            $statement_to_insert_user_details =
            'INSERT INTO User_details(login, password, email) VALUES (:login, :password, :email)';

            $stmt = $this->database->connect()->prepare($statement_to_insert_user_details);
            $stmt->bindParam(':login', $user->getLogin(), PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->execute();


            $statement_to_retrieve_user_detail_id =
                'SELECT id_user_detail FROM User_details WHERE login=:login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_detail_id);
            $stmt->bindParam(':login', $user->getLogin(), PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetch();
            $user_detail_id = $data['id_user_detail'];

            $statement_to_insert_user =
                'INSERT INTO Users(user_role, user_detail, name, surname) VALUES (2, :user_detail_id, :name, :surname )';
            $stmt = $this->database->connect()->prepare($statement_to_insert_user);
            $stmt->bindParam(':user_detail_id',$user_detail_id, PDO::PARAM_STR);
            $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
            $stmt->execute();
            return $user_detail_id;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}