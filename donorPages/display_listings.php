<?php

  spl_autoload_register(
    function($class){
      require_once "$class.php";
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

    <script src="./listings1.js"></script>

    <title>Brand New Baby (Listings)</title>
</head>
<body onload="display_default()">

    <div id="listing" style="margin-top: 20px; margin-left: 15px;">
        
        <?php
            # Obtain listings from ListingDAO
            # Display all listings in divs

            $listingDAO = new ListingDAO();
            $listings = $listingDAO->getListing();
            foreach ($listings as $listing){
                echo "<div style='border: 1px solid black; margin-bottom: 20px; width: 40%;' >
                    <ul>
                        <li style='list-style: none; margin-top: 5px;'> Name: {$listing->getName()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Category: {$listing->getCategory()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Item: {$listing->getItem()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Nearest MRT: {$listing->getMrt()}</li>
                    </ul>
                    
                    <div style='display: flex; justify-content: flex-end; margin-right: 10px; margin-bottom: 10px;'><input type='submit' value='Find out more &#8594;'></div>
                </div>
                ";
            }
        ?>
        

    </div>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>