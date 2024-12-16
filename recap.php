<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap of products</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo '<p> No products selected....</p>';
        }
        else{
            echo '<table>',
                    '<thead>',
                        '<tr>',
                            '<th>#</th>',
                            '<th>Name</th>',
                            '<th>Price</th>',
                            '<th>Quantity</th>',
                            '<th>Total</th>',
                        '</tr>',
                    '</thead>'
                    '<tbody>';
             
                    
 
                    


        
        }
    ?>
</body>
</html>