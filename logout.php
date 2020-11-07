<?php

session_start();

    // WRITE YOUR CODES HERE

    if (isset ($_SESSION["useremail"])){
        echo "<h3> You have successfully logged out </h3>";
        unset($_SESSION["useremail"]);
        unset($_SESSION["errors"]);
        $_SESSION = [];

        echo "<a href=login.php> Home </a>";
    }
    else
    {
        header("Location: login.php");
        $_SESSION = [];
        return;
    }

?>
