<?php

    // require( "../models/Database.php");
    require $_SERVER["DOCUMENT_ROOT"] . "/Assurance/app/models/Database.php";
    require("IServiceClaim.php");

    class ServiceClaim extends Database implements IService {
        
        public function insert(Claim $claim){

            $pdo = $this->connect();

            $id = $claim->getId();
            $description = $claim->getDescription();
            $date = $claim->getDate();
            $article_id = $claim->getArticle_id();

            
            $sql = "INSERT INTO claim VALUES (:id, :description, :date, :article_id)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":article_id", $article_id);


            $stmt->execute();


        }
        public function edit(Claim $claim){

            $pdo = $this->connect();

            $id = $claim->getId();
            $description = $claim->getDescription();
            $date = $claim->getDate();
            $article_id = $claim->getArticle_id();
            
            $sql = "UPDATE `claim` SET `description`=:description,`date`=:date,`article_id`=:article_id WHERE `id`=:id";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":article_id", $article_id);

            $stmt->execute();


        }

        public function delete($id){

            $pdo = $this->connect();
            
            $sql = "DELETE FROM claim WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        }

        public function display(){

            $pdo = $this->connect();
            
            $sql = "SELECT * FROM claim";

            $data = $pdo->query($sql);
            $claims = $data->fetchAll(PDO::FETCH_ASSOC);

            return $claims;


        }

    }

?>