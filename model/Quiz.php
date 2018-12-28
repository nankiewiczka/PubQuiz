<?php

class Quiz {

    private $id;
    private $name;
    private $date;
    private $status;

    public function __construct($name, $date, $status)
    {
        $this->name = $name;
        $this->date = $date;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }
}