<?php

require_once 'Question.php';
require_once __DIR__.'/../Database.php';

class QuestionMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getQuestionsByCategory (string $category) {
        try {
            $statement_to_retrieve_user =
                'SELECT * FROM QuestionsWithCategory
                  WHERE category_name = :category_name';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user);
            $stmt->bindParam(':category_name', $category, PDO::PARAM_STR);
            $stmt->execute();

            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $returnArray = [];
            $i=0;
            foreach ($array as $value) {
                $returnArray[$i] = new Question(
                    $value['question'], $value['category_name'], $value['answerA'],$value['answerB'],$value['answerC'],
                    $value['answerD'], $value['correct']
                );
                $i++;
            }
            return $returnArray;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}