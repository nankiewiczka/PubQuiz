<?php

class Quiz {

    private $id;
    private $name;
    private $date;
    private $enable;

    public function __construct($id, $name, $date, $enable)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->enable = $enable;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
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

    public function getEnable()
    {
        return $this->enable;
    }

    public function setEnable($enable): void
    {
        $this->enable = $enable;
    }
}