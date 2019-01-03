<?php

class Membership {

    private $id;
    private $user;
    private $team;
    private $startDateTime;
    private $endDateTime;

    public function __construct($id, $user, $team)
    {
        $this->id = $id;
        $this->user = $user;
        $this->team = $team;
    }


}