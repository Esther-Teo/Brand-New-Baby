<?php
    class Listing{
        private $username;
        private $category;
        private $item;
        private $mrt;

        public function __construct($username, $mrt, $category, $item){
            $this->username = $username;            
            $this->mrt = $mrt;
            $this->category = $category;
            $this->item = $item;
        }

        public function getName(){
            return $this->username;
        }

        public function getCategory(){
            return $this->category;
        }

        public function getItem() {
            return $this->item;
        }

        public function getMrt(){
            return $this->mrt;
        }
    }
?>