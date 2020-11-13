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


    <title>Brand New Baby (Donations)</title>

    <style>

        .form-popup {
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        .form-container {
        max-width: 500px;
        padding: 10px;
        background-color: white;
        }

    </style>
    

</head>
<body>

    <div id="donations" style="margin:20px auto; width:40%;">
        <div class="form-popup" id="myForm">
                <!-- Insert from js -->
        </div>
        
        <?php
            # Obtain donations from DonationDAO
            # Display all donations in divs

            $donationDAO = new DonationDAO();
            $donations = $donationDAO->getDonation();
            //var_dump($donations);
            foreach ($donations as $donation){
                echo "<div style='border: 1px solid black; margin-bottom: 30px;' >
                    <ul>
                        <li style='list-style: none; margin-top: 5px;'> Name: {$donation->getName()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Category: {$donation->getCategory()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Item: {$donation->getItem()}</li>
                        <li style='list-style: none; margin-top: 5px;'> Nearest MRT: {$donation->getMrt()}</li>
                    </ul>
                    
                    <div style='display: flex; justify-content: flex-end; margin-right: 10px; margin-bottom: 10px;'><button onclick='display_popup()' type='button' data-toggle='collapse' data-target='#myForm'>Find out more &#8594;</button></div>
                </div>
                

            
        
                
                <script>
                    function display_popup() {
                    let popup_str = '';";
                    
                    $username = $donation->getName();
                    $expandedDonationDAO = new ExpandedDonationDAO;
                    $expandeddonation = $expandedDonationDAO->getExpandedDonation($username);
                    
                    echo "popup_str += `<form action='/action_page.pgp' class='form-container'>

                        <label for='username'>Name:</label>
                        <p>{$expandeddonation->getName()}</p>

                        <label for='mrt'>Nearest MRT:</label>
                        <p>{$expandeddonation->getMrt()}</p>

                        <label for='item'>Item:</label>
                        <p>{$expandeddonation->getItem()}</p>

                        <label for='quantity'>Quantity:</label>
                        <p>{$expandeddonation->getQuantity()}</p>

                        <label for='itemcondition'>Item Condition:</label>
                        <p>{$expandeddonation->getItemCondition()}</p>

                        <button type='submit' class='btn btn-info btn-block'>I want this item</button>

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