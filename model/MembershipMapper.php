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
            $statement_to_get_index =
                'SELECT md.id_membership_detail FROM Membership_details md 
                JOIN Memberships m ON m.membership_detail = md.id_membership_detail 
                WHERE user=:user AND team=:team AND endDateTime IS NULL';

            $stmt = $this->database->connect()->prepare($statement_to_get_index);
            $stmt->bindParam(':user', $user->getId(), PDO::PARAM_STR);
            $stmt->bindParam(':team', $team->getId(), PDO::PARAM_STR);
            $stmt->execute();

            $detail_id = $stmt->fetch()['id_membership_detail'];
            $date='2000-01-01 00:00:00';
            $statement_to_update =
                'UPDATE Membership_details 
                SET endDateTime=:date WHERE id_membership_detail=:ind';
            $stmt = $this->database->connect()->prepare($statement_to_update);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':ind', $detail_id, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();

        }

    }

    public function getAllUsersWithoutTeam() {
        try {
            $statement_to_retrieve_user_without_any_memberships_history =
                'SELECT login FROM Users u 
                JOIN User_details ud ON u.user_detail = ud.id_user_detail 
                JOIN Roles r ON u.user_role = r.id_role
                WHERE u.id_user NOT IN (SELECT user FROM Memberships) 
                AND role NOT LIKE :admin AND login NOT LIKE :login';

            $admin_role = "admin";
            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_without_any_memberships_history);
            $stmt->bindParam(':admin', $admin_role, PDO::PARAM_STR);
            $stmt->bindParam(':login', $_SESSION["id"], PDO::PARAM_STR);
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
                'SELECT DISTINCT login From Memberships m 
                    JOIN Users u ON u.id_user = m.user
                    JOIN User_details ud ON u.user_detail = ud.id_user_detail
                    WHERE login NOT IN (SELECT login FROM Memberships m 
                    JOIN Membership_details md ON m.membership_detail = md.id_membership_detail
                    JOIN Users u ON u.id_user = m.user
                    JOIN User_details ud ON u.user_detail = ud.id_user_detail
                    WHERE endDateTime IS NULL) AND login NOT LIKE :login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_with_membership_history);
            $stmt->bindParam(':login', $_SESSION["id"], PDO::PARAM_STR);
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

    public function getAllMembersByTeamName(String $name) {
        try {
            $statement_to_retrieve_user_without_any_memberships_history =
                'SELECT login FROM Memberships m 
                JOIN Membership_details md ON m.membership_detail = md.id_membership_detail
                JOIN Users u ON u.id_user = m.user
                JOIN User_details ud ON ud.id_user_detail = u.user_detail
                JOIN Teams t ON t.id_team = m.team
                WHERE t.name LIKE :name AND endDateTime IS NULL AND login NOT LIKE :login';

            $login = $_SESSION["id"];
            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_without_any_memberships_history);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $returnArray = [];
            $i=0;
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

    public function getActualTeamByUserName(String $name) {
        try {
            $statement_to_retrieve_user_team =
                'SELECT t.name FROM Memberships m 
                JOIN Membership_details md ON m.membership_detail = md.id_membership_detail
                JOIN Users u ON u.id_user = m.user 
                JOIN User_details ud ON ud.id_user_detail = u.user_detail
                JOIN Teams t ON t.id_team = m.team
                AND startDateTime < NOW() AND endDateTime IS NULL AND login LIKE :login';

            $stmt = $this->database->connect()->prepare($statement_to_retrieve_user_team);
            $stmt->bindParam(':login', $name, PDO::PARAM_STR);
            $stmt->execute();
            $team = $stmt->fetch(PDO::FETCH_ASSOC);

            $number_of_rows = $stmt->rowCount();

            if($number_of_rows == 1)
                return $team['name'];
            else
                return "";

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}