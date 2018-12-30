<?php

class Quiz {

    private $id;
    private $name;
    private $status;
    private $startDateTime;
    private $endDateTime;

    public function __construct($id, $name, $status, $startDateTime, $endDateTime)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
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


    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    public function setStartDateTime($startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getEndDateTime()
    {
        return $this->endDateTime;
    }


}