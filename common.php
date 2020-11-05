<?php

/***
to auto-load class definitions from PHP files
***/
spl_autoload_register(function($class) {
    $path = $class . ".php";
    require_once $path; 
    
});


/***
session related stuff
***/
session_start();


/***
print errors based on session variable 'errors'
***/

function printErrors() {
    if(isset($_SESSION['errors'])){
        
        echo "<ul style='color:red;'>";
        
        foreach ($_SESSION['errors'] as $error) {
            echo $error . "</br>";
        }
        
        echo "</ul>";   
        unset($_SESSION['errors']);
    }
}

?>
