<?php
    require_once "../database/common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Brand New Baby (Listings By Category)</title>

    <!--Styling-->
    <style>
        h2 {
        }

        body {
            background-image: url("../images/showcatHygiene.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .heading {
            background-color: white;
            opacity: 0.8;
        }
    </style>

</head>
<body>
    
    <?php
        //var_dump($_GET);
        $category = $_GET["cat"];

        $dao = new DonationDAO;
        $listings = $dao->getDonationByCat($category);
        $count = count($listings);
        echo "<div class='container text-center p-3 mt-3 heading'> <h2>Number of listings under {$category}: {$count}</h2></div>";
        echo "<br>";

        echo "<div class='card-columns px-5'>";

        foreach ($listings as $listing){
            echo "<div class='card border-secondary mb-3'>";
            if ($listing->getCategory() == 'clothing') {
                echo "<img class='card-img-top' src='../images/cardclothes.jpg' alt='Card image cap'>";
            }
            elseif ($listing->getCategory() == 'toys') {
                echo "<img class='card-img-top' src='../images/cardtoys.jpg' alt='Card image cap'>";
            }

            elseif ($listing->getCategory() == 'hygiene') {
                echo "<img class='card-img-top' src='../images/cardhygiene.jpg' alt='Card image cap'>";
            }

            echo"
            <div class='card-body'>
                <form action='./display_bpopup.php'>
                    <h5 class='card-title'>Category: "; echo ucfirst($listing->getCategory()); echo"</h5>
                    <p class='card-text'>Name: {$listing->getName()}<br>Item: {$listing->getItem()}<br> </p>
                    <input type='hidden' name='u_name' value='{$listing->getName()}'>
                    <input type='submit' value='Find out more &#8594;'>
                </form>
            </div>
        </div>";
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
    