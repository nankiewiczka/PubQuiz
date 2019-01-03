<?php

class User
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $login;
    private $password;
    private $role;

    public function __construct($id, $name, $surname, $email, $login, $password, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

}