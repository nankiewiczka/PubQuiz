<?php

class Team
{
    private $id;
    private $name;
    private $captain;

    public function __construct($id, $name, $user)
    {
        $this->id = $id;
        $this->name = $name;
        $this->captain = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCaptain()
    {
        return $this->captain;
    }

}