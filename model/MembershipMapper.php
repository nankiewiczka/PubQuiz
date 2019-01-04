<?php

require_once 'Membership.php';
require_once 'UserMapper.php';
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
        try {
            $statement_to_update_membership =
                'UPDATE (Membership_details md JOIN Memberships m ON md.id_membership_detail = m.id_membership AND endStartDate IS NULL )
                SET endStartDate=1 WHERE user=:user AND team=:team';

            $stmt = $this->database->connect()->prepare($statement_to_update_membership);
            $stmt->bindParam(':user', $user->getId(), PDO::PARAM_STR);
            $stmt->bindParam(':team', $team->getId(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();

        }

    }

    public function getAllUserWithoutTeam() {
        try {
            $statement_to_retrieve_user_without_any_memberships_history =
                'SELECT login FROM Users u 
                JOIN User_details ud ON u.user_detail = ud.id_user_detail 
                JOIN Roles r ON u.user_role = r.id_role
                WHERE u.id_user NOT IN (SELECT user FROM Memberships) 
                AND role NOT LIKE :admin';

            $admin_role = "admin";
            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_without_any_memberships_history);
            $stmt->bindParam(':admin', $admin_role, PDO::PARAM_STR);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $returnArray = [];
            $i=0;
            $mapper = new UserMapper();
            foreach ($array as $value) {
                $returnArray[$i] = $mapper->getUser($value['login']);
                $i++;
            }

            $statement_to_retrieve_user_with_membership_history =
                'SELECT login From 
                 Memberships m 
                JOIN Membership_details md ON m.membership_detail = md.id_membership_detail
                JOIN Users u ON u.id_user = m.user
                JOIN User_details ud ON u.id_user = ud.id_user_detail
                WHERE endDateTime IS NOT NULL';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_with_membership_history);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $mapper = new UserMapper();
            foreach ($array as $value) {
                $returnArray[$i] = $mapper->getUser($value['login']);
                $i++;
            }

            return $returnArray;

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}