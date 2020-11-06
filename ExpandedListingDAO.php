<?php

  spl_autoload_register(
    function($class){
      require_once "$class.php";
      }
  );

  class ExpandedListingDAO {

    public function getExpandedListing($name) {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->getConnection();  
          $sql = 'SELECT username, item, category, quantity, wantedby, mrt, comments FROM beneficiarylisting where username = :name';         
          $stmt = $pdo->prepare($sql);   
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);  
          $stmt->execute();			
          $result = null;
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          if($row = $stmt->fetch()) {
            $result = new ExpandedListing($row['username'], $row['item'], $row['quantity'], $row['wantedby'], $row['mrt'], $row['comments']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }
  }
?>