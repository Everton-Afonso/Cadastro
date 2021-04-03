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

        public function insert($full_name, $cell, $state, $city, $date, $business_father){
            $pdo = connection();
            $select = $pdo->prepare("SELECT cell FROM user_information WHERE cell = :cell");
            $select->bindValue('cell', $cell);
            $select->execute();

            if($select->rowCount() > 0){
                return false;
            }else {
                $insert = $pdo->prepare("INSERT INTO user_information(full_name, cell, state, city, joined_on, business_father) 
                VALUES (:full_name, :cell, :state, :city, :joined_on, :business_father)");
                $insert->bindValue('full_name', $full_name);
                $insert->bindValue('cell', $cell);
                $insert->bindValue('state', $state);
                $insert->bindValue('city', $city);
                $insert->bindValue('joined_on', $date);
                $insert->bindValue('business_father', $business_father);
                $insert->execute();

                return true;
            }
        }

        public function select_id($id) {
            $pdo = connection();
            $result = array();

            $select = $pdo->prepare("SELECT * FROM user_information INNER JOIN business_father ON 
            id_business_father = business_father AND id_user = :id_user");
            $select->bindValue('id_user', $id);
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function select_network($name) {
            $pdo = connection();
            $result = array();

            $select = $pdo->prepare("SELECT * FROM user_information INNER JOIN business_father 
                ON id_business_father = business_father WHERE name = :name");
            $select->bindValue('name', $name);
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function delete($id){
            $pdo = connection();

            $delete = $pdo->prepare("DELETE FROM user_information WHERE id_user = :id_user");
            $delete->bindValue('id_user', $id);
            $delete->execute();
        }
    }
?>