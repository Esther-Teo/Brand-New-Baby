<?php

class User {
    private $username;
    private $passwordHash;
    private $rname;
    private $mobilenumber;
    private $mrt;
    private $acctype;
    


    function __construct($username, $passwordHash, $rname, $mobilenumber, $mrt, $acctype) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->rname = $rname;
        $this->mobilenumber = $mobilenumber;
        $this->mrt = $mrt;
        $this->acctype = $acctype;
    
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function setPasswordHash($hashed){
        $this->passwordHash = $hashed;
    }
    
    public function getRname(){
        return $this->rname;
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
