<?php

  spl_autoload_register(
    function($class){
      require_once("$class.php");
      }
  );

  class ListingDAO {

    public function getListing() {
      $connMgr = new ConnectionManager();      
      $pdo = $connMgr->connect();  
      $sql = 'SELECT username, mrt, category, item FROM beneficiarylisting';         
      $stmt = $pdo->prepare($sql);      
      $stmt->execute();			
      $result = [];
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      while($row = $stmt->fetch()) {
        $result[] = new Listing($row['username'], $row['mrt'], $row['category'], $row['item']);
      }
      $stmt = null;
      $pdo = null;
      return $result;
    }

    public function getListingByCat($category) {
      $connMgr = new ConnectionManager();      
      $pdo = $connMgr->connect();  
      $sql = 'SELECT username, mrt, category, item FROM beneficiarylisting where category = :category';         
      $stmt = $pdo->prepare($sql);   
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);     
      $stmt->execute();			
      $result = [];
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      while($row = $stmt->fetch()) {
        $result[] = new Listing($row['username'], $row['mrt'], $row['category'], $row['item']);
      }
      $stmt = null;
      $pdo = null;
      return $result;
    }
  }
?>