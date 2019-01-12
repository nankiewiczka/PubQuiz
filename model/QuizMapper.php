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

    public function getQuizesForAdmin() {
        try {
//            $status = "ended";
            $statement =
                'SELECT * FROM Quizes';

            $stmt = $this->database->connect()->prepare($statement);
//            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $returnArray = [];
            $i=0;
            foreach ($array as $value) {
                $returnArray[$i] = new Quiz($value['id_quiz'], $value['name'], $value['status'],$value['startDateTime'], $value['endDateTime']);
                $i++;
            }
            return $returnArray;

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getQuizesAvailableForUser(User $user) {
        try {
            $status = "started";
            $statement =
                'SELECT * FROM Quizes 
                WHERE id_quiz NOT IN (SELECT quiz_id FROM Scores WHERE user_id=:id)
                  AND status LIKE :status';

            $stmt = $this->database->connect()->prepare($statement);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $user->getId(), PDO::PARAM_STR);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $returnArray = [];
            $i=0;
            foreach ($array as $value) {
                $returnArray[$i] = new Quiz($value['id_quiz'], $value['name'], $value['status'],$value['startDateTime'], $value['endDateTime']);
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
                'INSERT INTO Quizes(name, status) VALUES (:name, :status)';
            $start = 0;
            $stmt = $this->database->connect()->prepare($statement_to_insert_user_details);
            $stmt->bindParam(':name', $quiz->getName(),  PDO::PARAM_STR);
            $stmt->bindParam(':status', $quiz->getStatus(),  PDO::PARAM_STR);
            $stmt->execute();

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getQuizByName(String $name): Quiz {
        try {
            $statement_to_retrieve_quiz =
                'SELECT * FROM Quizes 
                  WHERE name = :name';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_quiz);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();

            $quiz = $stmt->fetch(PDO::FETCH_ASSOC);
            if($quiz)
                return new Quiz($quiz['id_quiz'],$quiz['name'], $quiz['status'], $quiz['startDateTime'], $quiz['endDateTime']);
            else
                return null;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function startQuiz(int $id) {
        try {
            $statement_to_update_quiz =
                'UPDATE Quizes SET status = :status WHERE id_quiz= :id';
            $status = "started";
            $stmt = $this->database->connect()->prepare($statement_to_update_quiz);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function endQuiz(int $id) {
        try {
            $statement_to_update_quiz =
                'UPDATE Quizes SET status = :status WHERE id_quiz= :id';
            $status = "ended";
            $stmt = $this->database->connect()->prepare($statement_to_update_quiz);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}