<?php

  spl_autoload_register(
    function($class){
      require_once("$class.php");
      }
  );

  class ExpandedDonationDAO {

    public function getExpandedDonation($name) {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->connect();  
          $sql = 'SELECT username, category, item, quantity, itemcondition FROM donorlisting where username = :name';         
          $stmt = $pdo->prepare($sql);   
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);  
          $stmt->execute();			
          $result = null;
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          if($row = $stmt->fetch()) {
            $result = new ExpandedDonation($row['username'], $row['category'], $row['item'], $row['quantity'], $row['itemcondition']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }

    public function add($donation) {
      $insertOK = false;
      
      $conn = new ConnectionManager();
      $pdo = $conn->connect();
      
      # Get information from $donation
      $username = $donation->getName();
     /*  $mrt = $donation->getMrt(); */
      $category = $donation->getCategory();
      $item = $donation->getItem();
      $quantity = $donation->getQuantity();
      $itemcondition = $donation->getItemCondition();

      $sql = 'insert into donorlisting (username, category, item, quantity, itemcondition) values (:username,:category, :item, :quantity, :itemcondition)';

      $statement = $pdo->prepare($sql);
      $statement->bindParam(":username",$username,PDO::PARAM_STR);
      /* $statement->bindParam(":mrt",$mrt,PDO::PARAM_STR); */
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