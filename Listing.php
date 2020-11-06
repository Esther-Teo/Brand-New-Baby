<?php
    class Listing{
        private $name;
        private $category;
        private $item;
        private $mrt;

        public function __construct($name, $category, $item, $mrt){
            $this->name = $name;
            $this->category = $category;
            $this->item = $item;
            $this->mrt = $mrt;
        }

        public function getName(){
            return $this->name;
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