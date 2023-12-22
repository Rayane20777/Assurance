<?php

    class Premium {

        private $id;
        private $amount;
        private $date;
        private $claim_id;

        public function __construct($id, $amount, $date, $claim_id){
            $this->id = $id;
            $this->amount = $amount;
            $this->date = $date;
            $this->claim_id = $claim_id;


        }


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setAmount($amount){
            $this->amount = $amount;
        }

        public function getAmount(){
            return $this->amount;
        }
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }
        public function setClaim_id($claim_id){
            $this->claim_id = $claim_id;
        }

        public function getClaim_id(){
            return $this->claim_id;
        }


    }

?>