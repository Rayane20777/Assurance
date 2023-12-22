<?php

    // require( "../models/Database.php");
    require $_SERVER["DOCUMENT_ROOT"] . "/Assurance/app/models/Database.php";
    require("IServicePremium.php");

    class ServicePremium extends Database implements IService {
        
        public function insert(Premium $premium){

            $pdo = $this->connect();

            $id = $premium->getId();
            $amount = $premium->getAmount();
            $date = $premium->getDate();
            $claim_id = $premium->getClaim_id();

            
            $sql = "INSERT INTO premium VALUES (:id, :amount, :date, :claim_id)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":claim_id", $claim_id);


            $stmt->execute();


        }
        public function edit(Premium $premium){

            $pdo = $this->connect();

            $id = $premium->getId();
            $amount = $premium->getAmount();
            $date = $premium->getDate();
            $claim_id = $premium->getClaim_id();

            
            $sql = "UPDATE `premium` SET `amount`=:amount,`date`=:date,`claim_id`=:claim_id WHERE `id`=:id";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":claim_id", $claim_id);

            $stmt->execute();


        }

        public function delete($id){

            $pdo = $this->connect();
            
            $sql = "DELETE FROM premium WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        }

        public function display(){

            $pdo = $this->connect();
            
            $sql = "SELECT * FROM premium";

            $data = $pdo->query($sql);
            $claims = $data->fetchAll(PDO::FETCH_ASSOC);

            return $claims;


        }

    }

?>