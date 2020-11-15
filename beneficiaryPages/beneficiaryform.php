<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Beneficiary Form Page</title>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url("../images/listing_image.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }
    </style>

    <script src="./beneficiaryForm.js"></script>

</head>

<body>
    <div class="container">
        <form method="POST" action="./process_beneficiary_form.php" >
            <div class="form-group">
                <h4>What category do you want to donate?</h4>
                <select name="requestCategory" id="requestCategory" required onchange="updateItemOption()">
                    <option value="" disabled selected>Select your category</option>
                    <option value="clothing">Clothing</option>
                    <option value="toys">Toys</option>
                    <option value="hygiene">Hygiene</option>
                </select>
            </div>
            <div class="container">
                <div id="requestItem" class="form-group">
                </div>
                <div id="itemQuantity" class="form-group">
                </div>
                <div id="itemCondition" class="form-group">
                </div>
            </div>

            <div>
                <input type="reset" class="btn btn-info">
                <!-- use css to style the text to appear as button, upon clicking, turn the href back to the prev page -->
                <a href="../misc/bhome.php" class="btn btn-danger">Cancel</a>
                <button class="btn btn-success" type="submit" value="Submit" onclick="getConfirmation()">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
