<?php 
    require_once "./connection/connection.php";

    class user_information{
        public function select_user_information() {
            $pdo = connection();
            $result = array();
            $select = $pdo->query("SELECT * FROM user_information INNER JOIN business_father 
                ON id_business_father = business_father ORDER BY id_user DESC");

            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>