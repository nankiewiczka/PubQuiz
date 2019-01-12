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

    public function getScoresForUser(User $user) {
        try {
            $statement_to_retrieve_user =
                    'SELECT q.name, points from Scores s 
                    JOIN Users u ON u.id_user=s.user_id 
                    JOIN User_details ud ON u.user_detail=ud.id_user_detail
                    JOIN Quizes q ON q.id_quiz = s.quiz_id
                    WHERE login LIKE  :login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user);
            $stmt->bindParam(':login', $user->getLogin(), PDO::PARAM_STR);
            $stmt->execute();

            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $returnArray = [];
            $id = 0;
            foreach ($array as $value) {
                $temp = ['name'=>$value['name'], 'points'=>$value['points']];
                $returnArray[$id] = $temp;
                $id = $id +1;
            }

            return $returnArray;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }



    }
}