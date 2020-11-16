<?php

    spl_autoload_register(
        function($class){
            require_once("../database/$class.php");
        }
    );

    session_start();
    #Retrieve Information passed from form
    $username = $_SESSION["username"];
    $mrt = $_SESSION["mrt"];
    $category = $_POST["requestCategory"];
    $item = $_POST["requestItem"];
    $quantity = $_POST["itemQuantity"];
    
    $itemcondition = $_POST["itemCondition"];
    //$wantedby = $_POST["user_deadline"];
    //$comments = $_POST["user_comments"];

    /*
    echo "$category<br>"; 
    echo "$item<br>";
    echo "$quantity<br>";
    */
 
    $request = new ExpandedListing($username, $mrt, $category, $item, $quantity, $itemcondition);

    //var_dump($request);

    $dao = new ExpandedListingDAO;

    //var_dump($dao);

    $dao->add($request);
    //$insertOK = $dao->add($request);
    header("Location: ../misc/bhome.php");
    
    /* 
    if ($insertOK){
        echo "Request added";
    }
    else{
        echo "Request is not added";
    }
    */
?>
