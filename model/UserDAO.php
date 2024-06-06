<?php
include "../model/ConnectionDAO.php";

class UserDAO extends ConnectionDAO
{
    function personnel($username, $password)
    {
        $qry = "SELECT *
                    FROM personnel E
                    INNER JOIN users U ON U.empid = E.empid
                    WHERE `username`=? and `password`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->execute([$username, $password]);
            $ctr = 0;
            $arrRows = [];
            while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrRows[$ctr] = $res;
                $ctr++;
            }
            $this->closeConnection();

            if ($ctr > 0) {
                return $arrRows;
            } else {
                return array(0 => "Empty");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return array(0 => "Empty");
        }
    }
}
?>
