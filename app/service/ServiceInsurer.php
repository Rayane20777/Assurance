<?php

    // require( "../models/Database.php");
    require $_SERVER["DOCUMENT_ROOT"] . "/Assurance/app/models/Database.php";
    require("IServiceInsurer.php");

    class ServiceInsurer extends Database implements IService {
        
        public function insert(Insurer $insurer){

            $pdo = $this->connect();

            $id = $insurer->getId();
            $name = $insurer->getName();
            $address = $insurer->getAddress();

            
            $sql = "INSERT INTO insurer VALUES (:id, :name, :address)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":address", $address);


            $stmt->execute();


        }
        public function edit(Insurer $insurer){

            $pdo = $this->connect();

            $id = $insurer->getId();
            $name = $insurer->getName();
            $address = $insurer->getAddress();
            
            $sql = "UPDATE `insurer` SET `name`=:name,`address`=:address WHERE `id`=:id";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":address", $address);

            $stmt->execute();


        }

        public function delete($id){

            $pdo = $this->connect();
            
            $sql = "DELETE FROM insurer WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        }

        public function display(){

            $pdo = $this->connect();
            
            $sql = "SELECT * FROM insurer";

            $data = $pdo->query($sql);
            $insurers = $data->fetchAll(PDO::FETCH_ASSOC);

            return $insurers;


        }

    }

?>