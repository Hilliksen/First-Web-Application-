<?php
    session_start();
    ob_start();
?>


<nav>
    <a href="recap.php"><i class="fa-solid fa-cart-shopping"></i>CART</a>
    <a><?php 
        $productCount = isset($_SESSION['products']) ?  count($_SESSION['products']) : 0 ;
        echo $productCount;    
    ?></a>
</nav>



    <h1>ADD A PRODUCT</h1>
    <div id="container">
        <form action="processing.php?action=add" method = "post">
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

    <?php
        $content  = ob_get_clean();

        require_once "template.php";
    ?>