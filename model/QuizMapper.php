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
                $returnArray[$i] = new Quiz($value['name'], $value['date'], $value['status']);
                $i++;
            }
            return $returnArray;

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function isQuizNameAvailable(string $name) {
        try {
            $statement =
                'SELECT * FROM Quizes WHERE name=:name';

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

    public function addQuiz(Quiz $quiz) {
        try {
            $statement_to_insert_user_details =
                'INSERT INTO Quizes(name, date, status) VALUES (:name, :date, :status)';

            $stmt = $this->database->connect()->prepare($statement_to_insert_user_details);
            $stmt->bindParam(':name', $quiz->getName(),  PDO::PARAM_STR);
            $stmt->bindParam(':date', $quiz->getDate(),  PDO::PARAM_STR);
            $stmt->bindParam(':status', $quiz->getStatus(),  PDO::PARAM_STR);
            $stmt->execute();

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}