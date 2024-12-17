<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Teleshopping</title>
</head>
<body>


<div class="nav">
    <a href="recap.php"><i class="fa-solid fa-cart-shopping"></i>CART</a>
    <a><?php 
        $productCount = isset($_SESSION['products']) ?  count($_SESSION['products']) : 0 ;
        echo $productCount;    
    ?></a>
</div>



    <h1>ADD A PRODUCT</h1>
    <div id="container">
        <form action="processing.php" method = "post">
            <p>
                <label>
                    Name of the product : <br>
                    <input type = "text" name = "name">
                </label>
            </p>

            <p>
                <label>
                    Price of the product : <br>
                    <input type = "number" step = "0.1" name = "price"> 
                </label>
            </p>

            <p>
                <label> 
                    Desired quantity : <br>
                    <input type = "number" name = "qtt" value = "1">
                </label>
            </p>
            <p>
                <input type = "submit" name = "submit" value = "SUBMIT">
            </p>
        </form>
    </div>

</body>
</html>