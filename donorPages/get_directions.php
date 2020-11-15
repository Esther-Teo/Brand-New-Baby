<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    
    <title>Brand New Baby (Get Directions)</title>

</head>

<style>

    html, body {
        height: 100%; 
    }

    body {
        background-image: url("../images/get_directions.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;

    }

    #confirmation {
        width: 500px;
        margin: 150px auto;
        font-size: 15px;
        margin-bottom: 25px;
        background: #fff8f3; 
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;

    }

    .h2 {
        margin: 25px;
        text-align: center;
        
    }

    label {
        font-size:17px;
    }
       
        
</style>

<body>

        <div class="container" id = "confirmation"> 

                <form>

                    <h2 >
                        Confirmation
                    </h2>

                    <?php 
                        $mrt = $_GET["mrt"];
                        $u_name = $_GET["u_name"];
                    ?>

                    <div class="form-group">
                        <label for="donor_address">Please Confirm/ Enter Your Address: </label>
                        <input type="text" class="form-control" id="donor_address">
                    </div>

                    <div class = "form-group">
                        <label for="donor_address">Beneficiary's Nearest MRT Station: </label>
                        <input type="text" class="form-control" value= "<?php echo $mrt; ?>" id="beneficiary_address">
                    </div>

                    <div class = "form-group">

                        <button type="button" id="loc_button" class="btn btn-primary  btn-block" onclick="redirect_user()">Get Directions</button>
    
                    </div>
                    
            </form> 

                    <div class = "row">
                        
                        <div class = "col">
                            <button type="button" id="back_button" class="btn btn-secondary btn-block " onclick="location.href='../misc/display_popup.php?u_name=<?php echo $u_name ?>'">Back</button>
                        </div>
                        <div class = "col">
                            <button type="button" id="confirm_button" class="btn btn-danger btn-block " onclick="location.href='../misc/home.php'">Confirm</button>
                        </div>
            
                    </div>
    
        </div>


    <script>

        // API to get user's current location

        var beneficiary_address = ""; // RETRIEVE FROM CONFIRMATION.PHP 
        var googleAPIKey = "AIzaSyACwC8JkZBWX5lvshkdXl9XvoZDI7IZzG0"; //Harpreet's API key
        var url3 = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&key=" + googleAPIKey;
        
        // Global variables
        var donor_address = "";
        var beneficiary_address = document.getElementById("beneficiary_address").value;
        var address_elem = document.getElementById("donor_address");
        var locBtnElem = document.getElementById("locBtn");
    

        // When Page Loads
        // this is the code for getting user's current location: lat, lng
      
        function initMap() {
        
            // this attempts to get user permission to access location
        
            // Uses geolocation library to retrieve user's location
            if (navigator.geolocation) {
                
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    }; // -> this pos value is used to extract user's postal code 

                    // Step 4 (if user chooses Allow)
                    // get postal code (& address) given lat, lng
                    getLocation(pos);
    
                   
                }, function() {
                    handleLocationError(true);

                });
            } else {
                // error handling
                // Browser doesn't support Geolocation
                handleLocationError(false);
               
            }
        }

        function handleLocationError(browserHasGeolocation) {
            console.log("Error: Geolocation service failed!");
        } 

        // Step 4 (if user chooses Block)
        function handleLocationError() {
            console.log("Error: Geolocation service failed!");

        }


    /*
        Ajax call to get the geolocation information, including postal code given Lat & Lng
    */
    function getLocation(pos) {
       
        var addr =  pos.lat + ", " + pos.lng;
        console.log(addr);
        var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + addr + "&key=" + googleAPIKey;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                // expected response is JSON data
                var data = JSON.parse(this.responseText);
                console.log(data);

                donor_address = data.results[0].formatted_address;
                console.log(donor_address);
                
                if(donor_address=="") {
                    console.log("can't get location")
            
                } else {
                    document.getElementById("donor_address").value = donor_address;
                }
            }
        };
        
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    // function to redirect user to google map's website upon clicking "get directions" button

    function redirect_user() {
            var donor_address = document.getElementById("donor_address").value;
            console.log(donor_address);

            //!!!! BENEFICIARY_ADDRESS VAR needs to be retrieved from confirmation page
            //!!!! REMOVE DUMMY VARIABLE 

            var new_tab_link = "https://www.google.com/maps/dir/?api=1&origin=" + donor_address + "&destination=" + beneficiary_address;

            window.open(new_tab_link, "_blank");

            
        }

    </script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACwC8JkZBWX5lvshkdXl9XvoZDI7IZzG0&callback=initMap">  
    </script>
        


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 
</body>
</html>
    
