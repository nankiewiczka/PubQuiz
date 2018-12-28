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
}