<?php

require_once 'Team.php';
require_once __DIR__.'/../Database.php';
class TeamMapper
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

//    public function getAllQuizes() {
//        try {
//            $statement =
//                'SELECT * FROM Quizes ';
//
//            $stmt = $this->database->connect()->prepare($statement);
//            $stmt->execute();
//            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            $returnArray = [];
//            $i=0;
//            foreach ($array as $value) {
//                $returnArray[$i] = new Quiz($value['id_quiz'],$value['name'], $value['date'], $value['enable']);
//                $i++;
//            }
//            return $returnArray;
//
//        }
//        catch(PDOException $e) {
//            return 'Error: ' . $e->getMessage();
//        }
//    }

    public function isTeamNameAvailable(string $name) {
        try {
            $statement =
                'SELECT * FROM Teams WHERE name=:name';

            $stmt = $this->database->connect()->prepare($statement);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
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

    public function addTeam(String $name, User $user)
    {
        $connection = $this->database->connect();
        $connection->beginTransaction();

        try {
            $statement_to_insert_user_details =
                'INSERT INTO Teams(name, leader) VALUES (:name, :leader)';

            $stmt = $connection->prepare($statement_to_insert_user_details);
            $stmt->bindParam(':name', $name,  PDO::PARAM_STR);
            $stmt->bindParam(':leader', $user->getId(),  PDO::PARAM_STR);
            $stmt->execute();
            $team = $stmt->fetch(PDO::FETCH_ASSOC);

            $statement_to_insert_membership =
                'INSERT INTO Memberships(user, team) VALUES (:user, :team)';

            $t = $connection->lastInsertId();
            $stmt = $connection->prepare($statement_to_insert_membership);
            $stmt->bindParam(':user', $user->getId(), PDO::PARAM_STR);
            $stmt->bindParam(':team', $t, PDO::PARAM_STR);
            $stmt->execute();

            $connection->commit();

        } catch (Exception $e) {
            $connection->rollBack();
            echo $t;
        }
        $_SESSION["team_name"] = $name;
        $_SESSION["team_role"] = "leader";
        echo '0';
    }

    public function getTeamByName (string $name) {
        try {
            $statement_to_retrieve_team =
                'SELECT * FROM Teams 
                  WHERE name = :name';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_team);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();

            $team = $stmt->fetch(PDO::FETCH_ASSOC);
            if($team)
                return new Team($team['id_team'], $team['name'], $team['leader']);
            else
                return null;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}