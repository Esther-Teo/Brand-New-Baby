<?php

  spl_autoload_register(
    function($class){
      require_once("$class.php");
      }
  );

  class ExpandedListingDAO {

    public function getExpandedListing($name) {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->connect();  
          $sql = 'SELECT username, mrt, category, item, quantity, itemcondition FROM beneficiarylisting where username = :name';         
          $stmt = $pdo->prepare($sql);   
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);  
          $stmt->execute();			
          $result = null;
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          if($row = $stmt->fetch()) {
            $result = new ExpandedListing($row['username'],  $row['mrt'], $row['category'], $row['item'], $row['quantity'], $row['itemcondition']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }


    public function add($request) {
      $insertOK = false;
      
      $conn = new ConnectionManager();
      $pdo = $conn->connect();
      
      # Get information from $request
      $username = $request->getName();
      $mrt = $request->getMrt();
      $category = $request->getCategory();
      $item = $request->getItem();
      $quantity = $request->getQuantity();
      $itemcondition = $request->getItemCondition();

      $sql = "insert into beneficiarylisting (username, mrt, category, item, quantity, itemcondition) values (:username,:mrt,:category, :item, :quantity,  :itemcondition)";

      $statement = $pdo->prepare($sql);
      $statement->bindParam(":username",$username,PDO::PARAM_STR);
      $statement->bindParam(":mrt",$mrt,PDO::PARAM_STR);
      $statement->bindParam(":category",$category,PDO::PARAM_STR);
      $statement->bindParam(":item", $item,PDO::PARAM_STR);
      $statement->bindParam(":quantity",$quantity,PDO::PARAM_STR);
      $statement->bindParam(":itemcondition",$itemcondition,PDO::PARAM_STR);
      
      
      $insertOK = $statement->execute();

      
      $statement = null;
      $pdo = null;
      
      return $insertOK;
    }
  }
?>