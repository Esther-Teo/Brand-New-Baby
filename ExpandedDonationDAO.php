<?php

  spl_autoload_register(
    function($class){
      require_once "$class.php";
      }
  );

  class ExpandedDonationDAO {

    public function getDonation() {
          $connMgr = new ConnectionManager();      
          $pdo = $connMgr->getConnection();  
          $sql = 'SELECT username, category, item, mrt FROM donorlisting';         
          $stmt = $pdo->prepare($sql);      
          $stmt->execute();			
          $result = [];
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          while($row = $stmt->fetch()) {
            $result[] = new Donation($row['username'], $row['category'], $row['item'], $row['mrt']);
          }
          $stmt = null;
          $pdo = null;
          return $result;
    }

    public function add($donation) {
      $insertOK = false;
      
      $conn = new ConnectionManager();
      $pdo = $conn->getConnection();
      
      # Get information from $donation
      $name = $donation->getName();
      $mrt = $donation->getMrt();
      $category = $donation->getCategory();
      $item = $donation->getItem();
      $quantity = $donation->getQuantity();
      $itemcondition = $donation->getItemCondition();

      $sql = 'insert into donorlisting (username, mrt, category, item, quantity, itemcondition) values (:name,:mrt,:category, :item, :quantity, :itemcondition)';

      $statement = $pdo->prepare($sql);
      $statement->bindParam(":name",$name,PDO::PARAM_STR);
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