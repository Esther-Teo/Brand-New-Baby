<?php
    class ExpandedListing{
        private $name;
        private $category;
        private $item;
        private $quantity;
        private $wantedby;
        private $mrt;
        private $comments;

        public function __construct($name, $category, $item, $quantity, $wantedby, $mrt, $comments){
            $this->name = $name;
            $this->category = $category;
            $this->item = $item;
            $this->quantity = $quantity;
            $this->wantedby = $wantedby;
            $this->mrt = $mrt;
            $this->comments = $comments;
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
        
        public function getQuantity(){
            return $this->quantity;
        }

        public function getWantedBy() {
            return $this->wantedby;
        }

        public function getMrt(){
            return $this->mrt;
        }

        public function getComments(){
            return $this->comments;
        }
    }
?>