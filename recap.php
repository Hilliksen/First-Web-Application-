<?php
    session_start();
    ob_start();
?>


    <nav class = "second">
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i>GO BACK</a>
    </nav>
    
    <h1>YOUR PRODUCTS</h1>
    <div id="container">
        
        <?php 
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){  //# If session[products] is NOT set (the !) or its empty meaning no products were put in 
                echo "<p class ='error'> No products selected....</p>"; //# then we echo this
            }
            else{
                echo '<table>',   //# Here we just make a table containing our products
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
            $totalGeneral = 0; //# First we need to initialize the var to "store" our total, since we did it here and not inside of the loop then that means that += in the loop gives 0 + whatever total amount we got from products 
            foreach($_SESSION['products'] as $index => $product){ //# here we call upon the associative array 
                echo "<tr>",
                        "<td>". $index . "</td>", //               
                        "<td>". $product ["name"]. "</td>",                    
                        "<td>". number_format($product["price"], 2 , ",", "&nbsp;"). "&nbsp;£". "</td>",  //# We use number formatter to change the way our value is presented, so we start by getting the value first, then by saying 2 you mean 2 places after a decimal, next we show what sign is for decimal for us and after that we add a nonbreaking space. After we formatted our value we just add a symbol for money                   
                        "<td>". $product["qtt"]. "</td>",                    
                        "<td>". number_format($product["qtt"] * $product["price"], 2 , ",", "&nbsp;"). "&nbsp;£". "</td>",
                        "<td> 
                            <a href='processing.php?action=delete&id=$index'>Delete</a> 
                        </td>", 
                        "<td> 
                            <a href='processing.php?action=qtt-up&id=$index'>+</a>
                            <a href='processing.php?action=qtt-down&id=$index'>-</a> 
                        </td>",    //# Instead of using form like before you just make a link 
                        "</tr>";    
                    $totalGeneral += $product["qtt"] * $product["price"];                
            }
            echo "<tr>",
                    '<td colspan = 4> Total general : </td>',
                    '<td> <strong>'.number_format($totalGeneral, 2 , ',' , '&nbsp;'). '&nbsp;£</strong> </td>',
                    '<td> 
                        <a href="processing.php?action=clear">Clear</a> 
                    </td>',//# Much simpler than delete since it just deletes everything
                    
                    '</tbody>',
                '</table>';        
            
            }
        ?>

    </div>

    <?php
        $content  = ob_get_clean();
        require_once "template.php";
    ?>
