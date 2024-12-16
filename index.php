<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>

    <h1>Add a product</h1>
    <form action="processing.php" method = "post">
        <p>
            <label>
                Name of the product :
                <input type = "text" name = "name">
            </label>
        </p>

        <p>
            <label> 
                Price of the product :
                <input type = "number" step = "0.1" name = "price"> 
            </label>
        </p>

        <p>
            <label> 
                Desired quantity : 
                <input type = "name" name = "qtt" value = "1">
            </label>
        </p>
        <p>
            <input type = "submit" name = "submit" value = "Add the product">
        </p>
    </form>


</body>
</html>