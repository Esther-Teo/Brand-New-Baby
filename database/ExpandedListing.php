<?php
    class ExpandedListing{
        private $username;
        private $category;
        private $item;
        private $quantity;
        private $mrt;
        private $itemcondition;

        public function __construct($username, $mrt, $category, $item, $quantity, $itemcondition){
            $this->username = $username;
            $this->mrt = $mrt;
            $this->category = $category;
            $this->item = $item;
            $this->quantity = $quantity;
            $this->itemcondition = $itemcondition;
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
        
        public function getQuantity(){
            return $this->quantity;
        }

        public function getMrt(){
            return $this->mrt;
        }

        public function getItemCondition(){
            return $this->itemcondition;
        }
    }
?>