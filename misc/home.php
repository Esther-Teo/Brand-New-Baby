<?php
  require_once "../database/common.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Brand New Baby (Home)</title>
    <!--Styling-->
    <style>
      .navbar{
          background-color: #F8F6ED;
      }
      .nav-item{
          color: #B6985B;
          font-weight: bold;
      }
  </style>
  </head>

  <body>

    <!-- Navigation Bar-->

    <nav class="navbar navbar-expand-md">

        <div class="container">

            <!-- Logo -->
            
            <a class="navbar-brand">
                
                <img src="../images/confirmedlogo.png" width="100" height="100" alt="" loading="lazy">
            </a>

            <!-- Menu Options -->

            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="menu">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="../donorPages/donor_form.php" >Donate My Items</a>
                    <a class="nav-item nav-link" href="../misc/FAQ.html" >FAQ</a>
                    <a class="nav-item nav-link" href="../misc/Contact_Us.html" >Contact Us</a>
                    <a class="nav-item nav-link" href="../misc/About.html" >About</a>
                    

                </div>

            </div>
        
        </div>


    </nav>

    <!-- Carousel of highly requested items -->
    <div id="carouselitems" class="carousel slide mb-4" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#carouselitems" data-slide-to="0" class="active"></li>
          <li data-target="#carouselitems" data-slide-to="1"></li>
          <li data-target="#carouselitems" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 550px;">
          <div class="carousel-item active">
            <img src="../images/diaper.jpg" class="d-block w-100 h-30" alt="...">
            <div class="carousel-caption d-none d-md-block" style="position: absolute; z-index: 1; display: table; width: 100%; height: 100%; color: black;">
              <h1 style="display: table-cell; vertical-align: middle; text-align: center;">Call for help! Make a change today!</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/clothes.jpg" class="d-block w-100 h-30" alt="...">
            <div class="carousel-caption d-none d-md-block" style="position: absolute; z-index: 1; display: table; width: 100%; height: 100%; color: black;">
              <h1 style="display: table-cell; vertical-align: middle; text-align: center;">Highly requested category: <br> Clothing</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/toy.jpg" style="opacity: 0.5;" class="d-block w-100 h-30" alt="...">
            <div class="carousel-caption d-none d-md-block" style="position: absolute; z-index: 1; display: table; width: 100%; height: 100%; color: black;">
            <h1 style="display: table-cell; vertical-align: middle; text-align: center;">600 people have made a change so far, what about you?</h1>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselitems" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselitems" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- Dropdown List -->

      <div class="container text-center my-5" >

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle"  data-flip="false" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            View Active Listings
            </button>
            <div id="display_ddm" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./show_category.php?cat=Hygiene">Hygiene</a>
              <a class="dropdown-item" href="./show_category.php?cat=Clothing">Clothing</a>
              <a class="dropdown-item" href="./show_category.php?cat=Toys">Toys</a>
            </div>
        </div>

    </div>

    
    <!-- Active Listings Card -->
    <div class="card-columns mx-5">
      <?php
          $listingDAO = new ListingDAO();
          $listings = $listingDAO->getListing();
          foreach ($listings as $listing){
            echo "<div class='card border-secondary mb-3'>";
              if ($listing->getCategory() == 'Clothing') {
                echo "<img class='card-img-top' src='../images/cardclothes.jpg' alt='Card image cap'>";
              }
              elseif ($listing->getCategory() == 'Toys') {
                echo "<img class='card-img-top' src='../images/cardtoys.jpg' alt='Card image cap'>";
              }

              elseif ($listing->getCategory() == 'Hygiene') {
                echo "<img class='card-img-top' src='../images/cardhygiene.jpg' alt='Card image cap'>";
              }

            echo"
              <div class='card-body'>
                <form action='./display_popup.php'>
                  <h5 class='card-title'>Category: {$listing->getCategory()}</h5>
                  <p class='card-text'>Name: {$listing->getName()}<br>Item: {$listing->getItem()}<br> Nearest MRT: {$listing->getMrt()}</p>
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