<?php

  spl_autoload_register(
    function($class){
      require_once "$class.php";
      }
  );

  class ExpandedListingDAO {

    public function getExpandedListing($name) {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->connect();  
          $sql = 'SELECT username, category, item, quantity, wantedby, mrt, comments FROM beneficiarylisting where username = :name';         
          $stmt = $pdo->prepare($sql);   
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);  
          $stmt->execute();			
          $result = null;
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          if($row = $stmt->fetch()) {
            $result = new ExpandedListing($row['username'], $row['category'], $row['item'], $row['quantity'], $row['wantedby'], $row['mrt'], $row['comments']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }


    public function add($request) {
      $insertOK = false;
      
      $conn = new ConnectionManager();
      $pdo = $conn->getConnection();
      
      # Get information from $request
      $name = $request->getName();
      $category = $request->getCategory();
      $item = $request->getItem();
      $quantity = $request->getQuantity();
      $wantedby = $request->getWantedby();
      $mrt = $request->getMrt();
      $comments = $request->getComments();

      $sql = 'insert into beneficiarylisting (username, mrt, category, item, quantity, wantedby, comments) values (:name,:mrt,:category, :item, :quantity, :wantedby, :comments)';

      $statement = $pdo->prepare($sql);
      $statement->bindParam(":name",$name,PDO::PARAM_STR);
      $statement->bindParam(":mrt",$mrt,PDO::PARAM_STR);
      $statement->bindParam(":category",$category,PDO::PARAM_STR);
      $statement->bindParam(":item", $item,PDO::PARAM_STR);
      $statement->bindParam(":quantity",$quantity,PDO::PARAM_STR);
      $statement->bindParam(":wantedby",$wantedby,PDO::PARAM_STR);
      $statement->bindParam(":comments",$comments,PDO::PARAM_STR);
      
      
      $insertOK = $statement->execute();

      
      $statement = null;
      $pdo = null;
      
      return $insertOK;
    }
  }
?>