<?php
    class ExpandedDonation{
        private $name;
        private $mrt;
        private $category;
        private $item;
        private $quantity;
        private $itemcondition;

        public function __construct($name, $mrt, $category, $item, $quantity, $itemcondition){
            $this->name = $name;
            $this->mrt = $mrt;
            $this->category = $category;
            $this->item = $item;
            $this->quantity = $quantity;
            $this->itemcondition = $itemcondition;
        }

        public function getName(){
            return $this->name;
        }

        public function getMrt(){
            return $this->mrt;
        }

        public function getCategory() {
            return $this->category;
        }

        public function getItem() {
            return $this->item;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function getItemCondition() {
            return $this->itemcondition;
        }
    }
?>