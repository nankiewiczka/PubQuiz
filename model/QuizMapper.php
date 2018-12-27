<?php

require_once 'Quiz.php';
require_once __DIR__.'/../Database.php';
class QuizMapper
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllQuizes() {
        try {
            $statement =
                'SELECT * FROM Quizes ';

            $stmt = $this->database->connect()->prepare($statement);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $returnArray = [];
            $i=0;
            foreach ($array as $value) {
                $returnArray[$i] = new Quiz($value['id_quiz'],$value['name'], $value['date'], $value['enable']);
                $i++;
            }
            return $returnArray;

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}