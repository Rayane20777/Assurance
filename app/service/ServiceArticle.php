<?php

    // require( "../models/Database.php");
    require $_SERVER["DOCUMENT_ROOT"] . "/Assurance/app/models/Database.php";
    require("IServiceArticle.php");

    class ServiceArticle extends Database implements IService {
        
        public function insert(Article $article){

            $pdo = $this->connect();

            

            $id = $article->getId();
            $title = $article->getTitle();
            $content = $article->getContent();
            $date = $article->getDate();
            $insurer_id = $article->getInsurer_id();
            $client_id = $article->getClient_id();

            
            $sql = "INSERT INTO article VALUES (:id, :title, :content, :date, :insurer_id, :client_id)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":insurer_id", $insurer_id);
            $stmt->bindParam(":client_id", $client_id);


            $stmt->execute();


        }
        public function edit(Article $article){

            $pdo = $this->connect();

            $id = $article->getId();
            $title = $article->getTitle();
            $content = $article->getContent();
            $date = $article->getDate();
            $insurer_id = $article->getInsurer_id();
            $client_id = $article->getClient_id();
            
            $sql = "UPDATE `article` SET `title`=:title,`content`=:content,`date`=:date,`insurer_id`=:insurer_id ,`client_id`=:client_id WHERE `id`=:id";


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":insurer_id", $insurer_id);
            $stmt->bindParam(":client_id", $client_id);

            $stmt->execute();


        }

        public function delete($id){

            $pdo = $this->connect();
            
            $sql = "DELETE FROM article WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        }

        public function display(){

            $pdo = $this->connect();
            
            $sql = "SELECT * FROM article";

            $data = $pdo->query($sql);
            $articles = $data->fetchAll(PDO::FETCH_ASSOC);

            return $articles;


        }  }

    

?>