<?php


class Question
{
    private $question;
    private $category;
    private $answerA;
    private $answerB;
    private $answerC;
    private $answerD;
    private $correctAnswer;

    public function __construct($question, $category, $answerA, $answerB, $answerC, $answerD, $correctAnswer)
    {
        $this->question = $question;
        $this->category = $category;
        $this->answerA = $answerA;
        $this->answerB = $answerB;
        $this->answerC = $answerC;
        $this->answerD = $answerD;
        $this->correctAnswer = $correctAnswer;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAnswerA()
    {
        return $this->answerA;
    }

    public function getAnswerB()
    {
        return $this->answerB;
    }

    public function getAnswerC()
    {
        return $this->answerC;
    }

    public function getAnswerD()
    {
        return $this->answerD;
    }

    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }

}