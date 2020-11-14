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


    <title>Brand New Baby (Pop up)</title>

    <style>
        body {
            background-image: url("../images/popup.jpg");
        }

        .listing {
            background-color: white;
            opacity: 0.9;
            padding: 20px;
        }
        
    </style>

</head>
<body>
    <div class="container" style="padding: 20px;">
        <?php
            //var_dump($_GET);
            $uname = $_GET["u_name"];
            $expandedonationDAO = new ExpandedDonationDAO;
            $expandedlisting = $expandedonationDAO->getExpandedDonation($uname);
            
            echo "<form class='form-container listing'>

                <label for='name'>Name:</label>
                <p>{$expandedlisting->getName()}</p>

                <label for='comments'>Category:</label>
                <p>{$expandedlisting->getCategory()}</p>

                <label for='items'>Items:</label>
                <p>{$expandedlisting->getItem()}</p>

                <label for='quantity'>Quantity:</label>
                <p>{$expandedlisting->getQuantity()}</p>

                <label for='deadline'>Item Condition:</label>
                <p>{$expandedlisting->getItemCondition()}</p>



                <button type='button' class='btn btn-warning btn-block' onclick='popup()'>Accept Offer</button>

                </form>";
        ?>
    </div>

    <script>
        function popup() {
            alert("You can contact the donor at: 99388478 ")
        }
    </script>
</body>
</html>