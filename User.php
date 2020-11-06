<?php

class User {
    private $username;
    private $passwordHash;
    private $rname;
    private $mobilenumber;
    private $addrss;
    private $acctype;
    


    function __construct($username, $passwordHash, $rname, $mobilenumber, $addrss, $acctype) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->rname = $rname;
        $this->mobilenumber = $mobilenumber;
        $this->addrss = $addrss;
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

    public function getAddrss(){
        return $this->addrss;
    }

    public function getAcctype(){
        return $this->acctype;
    }
}
