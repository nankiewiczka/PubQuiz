<?php

require_once 'Membership.php';
require_once __DIR__.'/../Database.php';

class MembershipMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addMember(User $user, Team $team)
    {
        try {
            $statement_to_insert_membership =
                'INSERT INTO Memberships(user, team) VALUES (:user, :team)';

            $stmt = $this->database->connect()->prepare($statement_to_insert_membership);
            $stmt->bindParam(':user', $user->getId(), PDO::PARAM_STR);
            $stmt->bindParam(':team', $team->getId(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();

        }
    }

    public function deleteMember(User $user, Team $team)
    {

    }
}