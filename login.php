<?php 
    #reqr the file to connect to db
    #require_once a file for opening a session
    #Set an empty string to catch errors
    /*$error = '';
    if(isset($_POST['login'])){
        $user_email = trim($_POST["user_email"]);
        $user_password = trim($_POST["user_password"]);
        if (empty($user_email)){
            #$error += ;
        }
    }*/
    #Note that the php is not completed

?>
<!DOCTYPE html>
<html>
    <body>
        <div>
            <!--Insertion of nav bar? or image/ welcome message-->
            <div>
                <form method="post" action="process_login.php">  
                    Email <input type="text" name="user_email" value=""/>
                    <br/>
                    <!--<div></div> for the insert of error message-->
                    Password <input type="user_password" name="password"/>
                    <br/>
                    <!--<div></div> for the insert of error message-->
                    <input type="submit" value="Login"/>
                </form>
            </div>
            <div>
                <p href="">Forgot Password?</p>
            </div>
            <div>
                <p>New user? Register <span href="">here</span></p>
            </div>
        </div>
    </body>
</html>
