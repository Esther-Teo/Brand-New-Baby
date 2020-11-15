<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Brand New Baby (Product Link Page)</title>
    <style>
        .outer-box {
            width: 80%;
            margin: auto;
            border: 1px solid black;
            background-color: #d9dde1;
        }

        .top-box {
            width: 100%;
            margin: auto;
            border-bottom: 1px solid black;
            background-color: #e7d7e3;
            
        }

        .lower-box {
            width: 100%;
            margin: auto;
            text-align: left;
        }
        
        .btn {
            background-color:#e7d7e3;
            border: none;
        }

        .btn:hover {
            color: red;
        }

        .fa-chevron-circle-left {
            background-color: #e7d7e3;
        }
        
    </style>
    <script src="amazon_pdt.js"></script>
</head>

<?php
    $u_name = $_GET["u_name"];
    $item = $_GET["item"];
    if ($item == 'softToys') {
        $item = 'soft toys';
    }

    elseif ($item == 'male_clothing') {
        $item = 'baby male clothing';
    }

    elseif ($item == 'female_clothing') {
        $item = 'baby female clothing';
    }

    elseif ($item == 'unisex_clothing') {
        $item = 'baby unisex clothing';
    }

    elseif ($item == 'books') {
        $item = '123 book';
    }



?>

<body onload="add_amazon_product('<?php echo $item; ?>')">
    <div class="outer-box">
        
        <div class="top-box"> <!-----"back" button here----->
            <button type="button" onclick="location.href='../misc/home.php'" class="btn" style="font-size:25px"><i class="fa fa-chevron-circle-left"></i></button>
        </div>

        <div class="lower-box" > <!-----description here----->
            <div id="display_amazon_product"></div>
        </div>
    </div>
</body>
</html>
