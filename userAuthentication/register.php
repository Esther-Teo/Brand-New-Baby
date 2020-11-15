<?php
require_once('../database/common.php');

// WRITE YOUR CODES HERE
$tmp_username = '';
if (isset($_SESSION["register_fail"])){
    $tmp_username = $_SESSION["register_fail"];
    unset ($_SESSION["register_fail"]);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>Brand New Baby (Register)</title>
    </head>

    <style>
        /* Chrome, Safari, Edge, Opera */
/*         input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
 */
        /* Firefox */
/*         input[type=number] {
        -moz-appearance: textfield;
        } */

        html, body {
            height: 100%; 
        }

        body {
            background-image: url("../images/login_image.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-container {
            width: 400px;
            margin: 70px auto;
            font-size: 15px;
        }
        .login-container form {
            margin-bottom: 25px;
            background: #F5CAA0;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 25px;
            
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
        .error {
            border: 1px solid;
            margin: 10px 0px;
			padding: 15px 10px 15px 10px;
			/* background-repeat: no-repeat; */
            background-position: 10px center;
            text-align: center;
            color: #D8000C;
            background-color: #FFBABA;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100%;
            
        }
        
        .middle{
            position: absolute; 
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            }
        .btn{
            position: relative;
            display: block;
            color: black;
            font-size: 14px;
            font-family: "arial";
            text-decoration: none;
            margin: 30px 0;
            border: 1px solid black;
            background-color: #D3D3D3;
            padding: 14px 60px;
            text-transform: uppercase;
            overflow: hidden;
            transition: 1s all ease;
            }
        .btn::before{
            background: #dabfde;
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            z-index: -1;
            transition: all 0.6s ease;
            }

        .btn1::before{
            width: 0%;
            height: 100%;
            }

        .btn1:hover::before{
            width: 100%;
            }


        
        </style>


    <body>

        <div class = "login-container">

            <form action = "process_register.php" method="POST">
            <!-- Register heading -->
                <h2>
                    Register Now!
                </h2>

                <div class = "form-group">

                    <input type="text" name="user_name" placeholder = "Username" class="form-control" />
    
                </div>

                <div class = "form-group">

                    <input type="email" name="user_email" placeholder = "Email Address" class="form-control" />
                    
                </div>

               <div class = "form-group">

                    <input type="tel" name="user_number" placeholder = "Mobile Number (e.g. 81234567)" class="form-control" pattern="[8-9]{1}[0-9]{7}"/>
                    
                </div>

                <div class = "form-group">

                    <input type="password" name="password" placeholder = "Password" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="password" name="confirmPassword" placeholder = "Confirm Password" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="text" name="user_address" placeholder = "Nearest MRT Station" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="radio" name="acctype" placeholder = "Donor or Beneficiary?" id="donor" value="donor">
                    <label for="donor">Donor</label>

                    <input type="radio" name="acctype" placeholder = "Donor or Beneficiary?" id="beneficiary" value="beneficiary">
                    <label for="beneficiary">Beneficiary</label>


                </div>

                 <div class="form-group">

                <button type="submit" class="middle btn btn1" name="btn_register">Register</button>

                </div>  

            </form>
            <?php printErrors(); ?>
        </div>
        
    </body>
</html>
