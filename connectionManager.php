<?php
  class ConnectionManager {

    public function getConnection() {
      $dsn = "mysql:host=localhost;dbname=BBB_database;port=3306";
      $pdo = new PDO($dsn, "root", ""); 
      return $pdo;
    }
  }
?>