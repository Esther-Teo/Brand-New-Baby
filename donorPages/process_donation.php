<?php

    spl_autoload_register(
        function($class){
            require_once("../database/$class.php");
        }
    );

    #Retrieve Information passed from form
    $username = "Mike"; //use session to retrieve this info
    $category = $_POST["donationCategory"];
    $item = $_POST["donationItem"];
    $quantity = $_POST["itemQuantity"];
    $itemcondition = $_POST["itemCondition"];

  /*   
    echo "$category<br>"; 
    echo "$item<br>";
    echo "$quantity<br>";
    echo "$itemcondition";
    */

    $donation = new ExpandedDonation($username, $category, $item, $quantity, $itemcondition);

    #var_dump($donation);

    $dao = new ExpandedDonationDAO;

    //var_dump($dao);

    $dao->add($donation);
    #$insertOK = $dao->add($donation);

    
    /*
    if ($insertOK){
        echo "Donation added";
    }
    else{
        echo "Donation is not added";
    }*/
?>
<!--Can we just add html here and combine it with confirmation.php?-->