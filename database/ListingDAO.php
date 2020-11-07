<?php

  spl_autoload_register(
    function($class){
      require_once "$class.php";
      }
  );

  class ListingDAO {

    public function getListing() {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->connect();  
          $sql = 'SELECT username, category, item, mrt FROM beneficiarylisting';         
          $stmt = $pdo->prepare($sql);      
          $stmt->execute();			
          $result = [];
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          while($row = $stmt->fetch()) {
            $result[] = new Listing($row['username'], $row['category'], $row['item'], $row['mrt']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }
  }
?>