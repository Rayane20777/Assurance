<?php

    class Client {

        private $id;
        private $first_name;
        private $last_name;
        private $address;
        private $date;

        public function __construct($id, $first_name, $last_name, $address, $date){
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->address = $address;
            $this->date = $date;


        }


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setFirst_name($first_name){
            $this->first_name = $first_name;
        }

        public function getFirst_name(){
            return $this->first_name;
        }
        public function setLast_name($last_name){
            $this->last_name = $last_name;
        }

        public function getLast_name(){
            return $this->last_name;
        }
        public function setAddress($address){
            $this->address = $address;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

    }

?>