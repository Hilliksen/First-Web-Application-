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
                    '</thead>',
                    '<tbody>';
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo '<tr>',
                    '<td>'. $index . '</td>',                    
                    '<td>'. $product ['name']. '</td>',                    
                    '<td>'. number_format($product['price'], 2 , ',', '&nbsp;'). '&nbsp;£'. '</td>',                    
                    '<td>'. $product['qtt']. '</td>',                    
                    '<td>'. number_format($product['price'], 2 , ',', '&nbsp;'). '&nbsp;£'. '</td>',
                 '</tr>';    
                $totalGeneral += $product['total'];                
        }
        echo '<tr>',
                '<td colspan = 4> Total general : </td>',
                '<td> <strong>'.number_format($totalGeneral, 2 , ',' , '&nbsp;'). '&nbsp;£</strong> </td>',
              '</tbody>',
            '</table>';        
        
        }
    ?>
</body>
</html>