<?php

  spl_autoload_register(
    function($class){
      require_once("../database/$class.php");
      }
  );
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>BNB Pop up</title>
</head>
<body>
    <div class="container" style="padding: 20px;">
        <?php
            //var_dump($_GET);
            $uname = $_GET["u_name"];
            $expandedlistingDAO = new ExpandedListingDAO;
            $expandedlisting = $expandedlistingDAO->getExpandedListing($uname);
            
            echo "<form class='form-container'>

                <label for='name'>Name:</label>
                <p>{$expandedlisting->getName()}</p>

                <label for='items'>Items:</label>
                <p>{$expandedlisting->getItem()}</p>

                <label for='quantity'>Quantity:</label>
                <p>{$expandedlisting->getQuantity()}</p>

                <label for='deadline'>Wanted By:</label>
                <p>{$expandedlisting->getWantedBy()}</p>

                <label for='mrt'>Nearest MRT:</label>
                <p>{$expandedlisting->getMrt()}</p>

                
                <label for='comments'>Comments:</label>
                <p>{$expandedlisting->getComments()}</p>

                <button type='submit' class='btn btn-warning btn-block'>I have item</button>
                <button type='submit' class='btn btn-info btn-block'>I need to purchase item</button>

                </form>";
        ?>
    </div>
</body>
</html>