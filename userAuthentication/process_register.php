<?php

require_once("../database/common.php");

$errors = [];


// Get the data from form processing
$username = $_POST["user_name"]; 
if ( strlen($username) == 0 ) {
    $errors[] = "Username cannot be empty nor blank.";
}

$useremail = $_POST["user_email"]; 
if ( strlen($useremail) == 0 || !strstr($useremail, "@")) {
    $errors[] = "Email cannot be blank.";
}


$mobilenumber = strval($mobilenumber);

$mobilenumber = $_POST["user_number"]; 
if ( strlen($mobilenumber) != 8 ) {
    $errors[] = "Please enter a valid phone number.";
}

// elseif ($mobilenumber[0] != '8' || $mobilenumber[0] != '9') {
//     $errors[] = "Please enter a valid phone number.";
// }
    
$password = $_POST["password"]; 
if ( strlen($password) < 9){
    if ( strlen($password) ==0){
        $errors[] = "Password cannot be empty nor blank.";
    }else{
        $errors[] = "Password must contain at least 9 characters";
    }
}
if((preg_match('/[A-Z]/', $password)!==1 )){
    $errors[] = "Password must contain at least one uppercase letter.";
}
if((preg_match('/[a-z]/', $password)!==1 )){
    $errors[] = "Password must contain at least one lowercase letter.";
}	
if((preg_match('/[1-9]/', $password)!==1 )){
    $errors[] = "Password must contain at least one number.";
}

$confirm_password = $_POST["confirmPassword"];


if ($password != $confirm_password){
    $errors[] = "The passwords are different.";
}

$mrt = $_POST["user_address"]; 
$mrt = strtolower($mrt);
$mrt = str_replace(" ", "", $mrt);
$mrt_list = ["jurongeast", "bukitbatok", "bukitgombak", "choachukang", "yewtee", "kranji", "marsiling", "woodlands", "admiralty", "sembawang", "canberra", "yishun", "khatib", "yiochukang", "angmokio", "bishan", "braddell", "toapayoh", "novena", "newton", "orchard", "somerset", "dhobyghaut", "cityhall", "rafflesplace", "marinabay", "marinasouthpier", "pasirris", "tampines", "simei", "tanahmerah", "bedok", "kembangan", "eunos", "payalebar", "aljunied", "kallang", "lavender", "bugis", "tanjongpagar", "outrampark", "tiongbahru", "redhill", "queenstown", "commonwealth", "buonavista", "dover", "clementi", "chinesegarden", "lakeside", "boonlay", "pioneer", "jookoon", "gulcircle", "tuascrescent", "tuaswestroad", "tuaslink", "expo", "changiairport", "habourfront", "chinatown", "clarkequay", "littleindia", "farrerpark", "boonkeng", "potongpasir", "woodleigh", "serangoon", "kovan", "hougang", "buangkok", "sengkang", "punggol", "brasbasah", "esplanade", "promenade", "nicollhighway", "stadium", "mountbatten", "dakota", "macpherson", "taiseng", "bartley", "lorongchuan", "marymount", "caldecott", "botanicgardens", "farrerroad", "hollandvillage", "onenorth", "one-north", "kentridge", "hawparvilla", "pasirpanjang", "labradorpark", "telokblangah", "bayfront", "bukitpanjang", "cashew", "hillview", "beautyworld", "kingalbertpark", "sixthavenue", "tankahkee", "stevens", "rochor", "downtown", "telokayer", "fortcanning", "bencoolen", "jalanbesar", "geylangbahru", "bendemeer", "mattar", "ubi", "kakibukit", "bedoknorth", "bedokreservoir", "tampineswest", "tampines", "tampineseast", "upperchangi", "woodlandsnorth", "woodlandssouth"];
if ( strlen($mrt) == 0 ) {
    $errors[] = "Nearest MRT cannot be empty nor blank.";
}

elseif (!in_array($mrt, $mrt_list)) {
    $errors[] = "Enter a valid nearest MRT station.";
}

//elseif() 

$acctype = $_POST["acctype"]; 
if ( strlen($acctype) == 0 ) {
    $errors[] = "Please state if you are a donor or beneficiary.";
}

elseif(!(strtolower($acctype) === "donor" || strtolower($acctype) === "beneficiary")) {
    $errors[] = "Please state if you are a donor or beneficiary.";
}


// Check if username is already taken
if ( strlen($useremail) != 0 ){
    $dao = new UserDAO();
    $user = $dao->get($useremail);

    if ($user){
        $errors[] = "Email is already taken.";
    }
}

// If one or more fields have validation error
if ( count($errors) > 0 ) {
    // Put the error message in session variable 'errors'
    $_SESSION["errors"] = $errors;
        
    // return to register.php
    // keep the username, require the user to rekey the password
    $_SESSION["register_fail"] = $username;
    header("Location: register.php"); 
    return;
}

$username = $_POST["user_name"];
$mobilenumber = $_POST["user_number"];
$mrt = $_POST["user_address"];
$acctype = $_POST["acctype"];


$hashed = password_hash($password, PASSWORD_DEFAULT);
$new_user = new User($useremail, $hashed, $username, $mobilenumber, $mrt, $acctype);
$dao = new UserDAO();
    
$status = $dao->create($new_user);
    
    
if ( $status ) {
    // success; redirect page
    $_SESSION["login_page"] = $useremail;
    header("Location: login.php");
    exit();
}
else
{
    $_SESSION["register_fail"]= $useremail;
    $errors[] = "Error in registering user user.";
    header("Location: register.php");
    return;
}
    
    
?>
