<!DOCTYPE HTML>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="#">

    <!-- Custom JavaScript -->
    <script src="donationForm.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url("../images/form.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            background-color: #E3E2DC;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="./process_donation.php">
            <div>
                <h4>What category do you want to donate?</h4>
                <select name="donationCategory" id="donationCategory" required onchange="updateItemOption()">
                    <option value="" disabled selected>Select your category</option>
                    <option value="clothing">Clothing</option>
                    <option value="toys">Toys</option>
                    <option value="hygiene">Hygiene</option>
                </select>
            </div>
            <div class="container">
                <div id="donationItem">
                </div>
                <div id="itemQuantity">
                </div>
                <div id="itemCondition">
                </div>
            </div>

            <div>
                <input type="reset">
                <!-- use css to style the text to appear as button, upon clicking, turn the href back to the prev page -->
                <a href="../misc/home.html" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-success" input type="submit" value="Submit">Submit</button>
            </div>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

</html>