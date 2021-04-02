<?php 
    require_once "./connection/connection.php";
    class business_father{

        public function select_business_father() {
            $pdo = connection();
            $result = array();
            $select = $pdo->query("SELECT * FROM business_father");

            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>