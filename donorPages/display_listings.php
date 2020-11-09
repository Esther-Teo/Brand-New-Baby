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


    <title>Brand New Baby (Listings)</title>

    <style>

        .form-popup {
        position: fixed;
        bottom: 0;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        .form-container {
        max-width: 500px;
        padding: 20px;
        justify-content: center;
        background-color: white;
        }

    </style>
    

</head>
<body>

    <div id="listing" style="margin:20px auto; width:40%;">
        <div class="form-popup" id="myForm">
                <!-- Insert from js -->
        </div>
        
        <?php
            # Obtain listings from ListingDAO
            # Display all listings in divs

            $listingDAO = new ListingDAO();
            $listings = $listingDAO->getListing();
            foreach ($listings as $listing){
                echo "<div style='border: 1px solid black; margin-bottom: 30px;' >
                    <ul>
                        <li style='list-style: none; margin-top: 5px;'> Name: {$listing->getName()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Category: {$listing->getCategory()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Item: {$listing->getItem()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Nearest MRT: {$listing->getMrt()}</li>
                    </ul>
                    
                    <div style='display: flex; justify-content: flex-end; margin-right: 10px; margin-bottom: 10px;'><button onclick='display_popup()' type='button' data-toggle='collapse' data-target='#myForm'>Find out more &#8594;</button></div>
                </div>
                

            
        
                
                <script>
                    function display_popup() {
                    let popup_str = '';";
                    
                    $name = $listing->getName();
                    $expandedlistingDAO = new ExpandedListingDAO;
                    $expandedlisting = $expandedlistingDAO->getExpandedListing($name);
                    
                    echo "popup_str += `<form action='/action_page.pgp' class='form-container'>

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

                        </form>
                        `;

                            var popup = document.getElementById('myForm');
                            popup.innerHTML = popup_str;
                        }
                </script>";

                
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