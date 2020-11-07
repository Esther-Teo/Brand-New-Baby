<?php

class UserDAO {
       
    function get( $useremail ) {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare select
        $sql = "SELECT useremail, password_hash, username, mobilenumber, mrt, acctype FROM useraccount WHERE useremail = :useremail";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":useremail", $useremail, PDO::PARAM_STR);
            
        $user = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $user = new User($row["useremail"], $row["password_hash"], $row["username"], $row["mobilenumber"], $row["mrt"], $row["acctype"]);
            }
            
        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $user;
    }
    
    function create($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert

        $sql = "INSERT INTO useraccount (useremail, password_hash, username, mobilenumber, mrt, acctype) VALUES (:useremail, :passwordHash, :username, :mobilenumber, :mrt, :acctype)";
        $stmt = $conn->prepare($sql);
        
        $useremail = $user->getUseremail();
        $passwordHash = $user->getPasswordHash();
        $username = $user->getUsername();
        $mobilenumber = $user->getMobileNumber();
        $mrt = $user->getMrt();
        $acctype = $user->getAcctype();
        

        $stmt->bindParam(":useremail", $useremail, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":mobilenumber", $mobilenumber, PDO::PARAM_STR);
        $stmt->bindParam(":mrt", $mrt, PDO::PARAM_STR);
        $stmt->bindParam(":acctype", $acctype, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    function update($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "UPDATE useraccount SET password_hash = :passwordHash  WHERE useremail = :useremail";
        $stmt = $conn->prepare($sql);
        
        $useremail = $user->getUseremail();
        $passwordHash = $user->getPasswordHash();

        $stmt->bindParam(":useremail", $useremail, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}
?>
