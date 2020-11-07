<?php

    spl_autoload_register(
        function($class){
        require_once "../database/$class.php";
        }
    );

    #Retrieve Information passed from form
    $name = "helen"; //use session to retrieve this info
    $category = $_POST["requestCategory"];
    $item = $_POST["user_items"];
    $quantity = $_POST["user_quantity"];
    $mrt = "Serangoon"; //use session to retrieve this info
    $wantedby = $_POST["user_deadline"];
    $comments = $_POST["user_comments"];

    /*
    echo "$category<br>"; 
    echo "$item<br>";
    echo "$quantity<br>";
    */
 
    $request = new ExpandedListing($name, $category, $item, $quantity, $wantedby, $mrt, $comments);

    //var_dump($request);

    $dao = new ExpandedListingDAO;

    //var_dump($dao);

    $dao->add($request);
    //$insertOK = $dao->add($request);

    
    /* 
    if ($insertOK){
        echo "Request added";
    }
    else{
        echo "Request is not added";
    }
    */
?>
