<?php

class Team
{
    private $id;
    private $name;
    private $user;

    public function __construct($id, $name, $user)
    {
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUser()
    {
        return $this->user;
    }

}