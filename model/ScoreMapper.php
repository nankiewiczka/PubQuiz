<?php

require_once __DIR__.'/../Database.php';
class ScoreMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addScore(User $user, Quiz $quiz, $points)
    {
        try
        {
            $statement_to_insert_user_details =
                'INSERT INTO Scores(user_id, quiz_id, points) VALUES (:user, :quiz, :points)';

            $stmt = $this->database->connect()->prepare($statement_to_insert_user_details);
            $stmt->bindParam(':user', $user->getId(),  PDO::PARAM_STR);
            $stmt->bindParam(':quiz', $quiz->getId(),  PDO::PARAM_STR);
            $stmt->bindParam(':points', $points,  PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
        return $quiz->getId();
    }
}