<?php

    class Article {

        private $id;
        private $title;
        private $content;
        private $date;
        private $insurer_id;
        private $client_id;

        public function __construct($id, $title, $content, $date, $insurer_id, $client_id){
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->date = $date;
            $this->insurer_id = $insurer_id;
            $this->client_id = $client_id;


        }


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getTitle(){
            return $this->title;
        }
        public function setContent($content){
            $this->content = $content;
        }

        public function getContent(){
            return $this->content;
        }
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function setInsurer_id($insurer_id){
            $this->insurer_id = $insurer_id;
        }

        public function getInsurer_id(){
            return $this->insurer_id;
        }
        public function setClient_id($client_id){
            $this->client_id = $client_id;
        }

        public function getClient_id(){
            return $this->client_id;
        }

    }

?>