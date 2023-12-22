<?php

    class Claim {

        private $id;
        private $description;
        private $date;
        private $article_id;

        public function __construct($id, $description, $date, $article_id){
            $this->id = $id;
            $this->description = $description;
            $this->date = $date;
            $this->article_id = $article_id;


        }


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }
        public function setArticle_id($article_id){
            $this->article_id = $article_id;
        }

        public function getArticle_id(){
            return $this->article_id;
        }

    }

?>