<?php

  spl_autoload_register(
    function($class){
      require_once("$class.php");
      }
  );

  class DonationDAO {

    public function getDonation() {
        $connMgr = new ConnectionManager();      
        $pdo = $connMgr->connect();  
        $sql = 'SELECT username, category, item FROM donorlisting';         
        $stmt = $pdo->prepare($sql);      
        $stmt->execute();			
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
        $result[] = new Donation($row['username'], $row['category'], $row['item']);
        }
        $stmt = null;
        $pdo = null;
        return $result;
    }
  }
?>