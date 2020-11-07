<?php

class User {
    private $useremail;
    private $passwordHash;
    private $username;
    private $mobilenumber;
    private $mrt;
    private $acctype;
    


    function __construct($useremail, $passwordHash, $username, $mobilenumber, $mrt, $acctype) {
        $this->useremail = $useremail;
        $this->passwordHash = $passwordHash;
        $this->username = $username;
        $this->mobilenumber = $mobilenumber;
        $this->mrt = $mrt;
        $this->acctype = $acctype;
    
    }

    public function getUseremail(){
        return $this->useremail;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function setPasswordHash($hashed){
        $this->passwordHash = $hashed;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getMobileNumber(){
        return $this->mobilenumber;
    }

    public function getMrt(){
        return $this->mrt;
    }

    public function getAcctype(){
        return $this->acctype;
    }
}
