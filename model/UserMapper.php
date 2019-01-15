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
                  RIGHT JOIN Roles 
                  ON Users.user_role = Roles.id_role
                  WHERE login = :login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user)
                return new User($user['id_user'],$user['name'], $user['surname'], $user['email'], $user['login'], $user['password'], $user['role']);
            else
                return null;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getUsers()
    {
        try {
            $statement = 'SELECT * FROM Userview
                            WHERE login NOT LIKE :login';
            $stmt = $this->database->connect()->prepare($statement);
            $stmt->bindParam(':login', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function delete(int $id): void
    {
        $connection = $this->database->connect();
        $connection->beginTransaction();

        try {
            $statement_to_delete_teamleader =
                'DELETE FROM Teams WHERE leader=:leader';

            $stmt = $connection->prepare($statement_to_delete_teamleader);
            $stmt->bindParam(':leader', $id,  PDO::PARAM_STR);
            $stmt->execute();

            $statement_to_delete_scores =
                'DELETE FROM Scores WHERE user_id=:user';

            $stmt = $connection->prepare($statement_to_delete_scores);
            $stmt->bindParam(':user', $id,  PDO::PARAM_STR);
            $stmt->execute();

            $statement_to_delete_membership =
                'DELETE FROM Memberships WHERE user=:user';

            $stmt = $connection->prepare($statement_to_delete_membership);
            $stmt->bindParam(':user', $id,  PDO::PARAM_STR);
            $stmt->execute();

            $statement_to_delete_user =
                'DELETE FROM Users WHERE id_user=:user';

            $stmt = $connection->prepare($statement_to_delete_user);
            $stmt->bindParam(':user', $id,  PDO::PARAM_STR);
            $stmt->execute();

            $connection->commit();

        } catch (Exception $e) {
            $connection->rollBack();
            echo '1';
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

            $user_detail_id = $stmt->fetch()['id_user_detail'];

            $statement_to_insert_user =
                'INSERT INTO Users(user_role, user_detail, name, surname) VALUES (2, :user_detail_id, :name, :surname )';
            $stmt = $this->database->connect()->prepare($statement_to_insert_user);
            $stmt->bindParam(':user_detail_id',$user_detail_id, PDO::PARAM_STR);
            $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function isUserLoginAvailable(string $login) {
        try {
            $statement =
                'SELECT * FROM User_details WHERE login=:login';

            $stmt = $this->database->connect()->prepare($statement);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();

            $number_of_rows = $stmt->rowCount();

            if($number_of_rows != 0)
                echo '1';
            else
                echo '0';
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


}