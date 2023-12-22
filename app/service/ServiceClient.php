<?php

    // require( "../models/Database.php");
    require $_SERVER["DOCUMENT_ROOT"] . "/Assurance/app/models/Database.php";
    require("IServiceClient.php");

    class ServiceClient extends Database implements IService {
        
        public function insert(Client $client){

            $pdo = $this->connect();

            $id = $client->getId();
            $first_name = $client->getFirst_name();
            $last_name = $client->getLast_name();
            $address = $client->getAddress();
            $date = $client->getDate();

            
            $sql = "INSERT INTO client VALUES (:id, :first_name, :last_name, :address, :date)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":first_name", $first_name);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":date", $date);


            $stmt->execute();


        }
        public function edit(Client $client){

            $pdo = $this->connect();

            $id = $client->getId();
            $first_name = $client->getFirst_name();
            $last_name = $client->getLast_name();
            $address = $client->getAddress();
            $date = $client->getDate();
            
            $sql = "UPDATE `client` SET `first_name`=:first_name,`last_name`=:last_name,`address`=:address,`date`=:date WHERE `id`=:id";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":first_name", $first_name);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":date", $date);

            $stmt->execute();


        }

        public function delete($id){

            $pdo = $this->connect();
            
            $sql = "DELETE FROM client WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        }

        public function display(){

            $pdo = $this->connect();
            
            $sql = "SELECT * FROM client";

            $data = $pdo->query($sql);
            $clients = $data->fetchAll(PDO::FETCH_ASSOC);

            return $clients;


        }

    }

?>