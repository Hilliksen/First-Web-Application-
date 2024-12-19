<?php

session_start(); 



if (isset($_GET['action'])){
    
    switch ($_GET['action']){
        case 'add';
            if(isset($_POST['submit'])){ //# If the buttong submit as been clicked then its gonna start running this code
            
                //! IMPORTANT 
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                //# Here we filter whatever the name user has submitted and we sanitaze or remove the harmful special characters like HTML tags
                
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                
                //# here we verify that the input is a float (1.23) and by flag allow we allow the number to have , or . we have to put that because php only allows . for the float, so anything with coma like 1,23 will not be accepted since it isnt a float for php
                
                
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //# we just check if the input is a int 
            
            
                //IMPO The filter functions return truthy values if the input is valid. If any value is invalid or doesn't exist, the variable will be falsy (e.g., null or false). As a result, the `if` condition below will only pass if all inputs are valid.
                if($name && $price && $qtt){ 
                    
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
            
                    $_SESSION['products'][] = $product; //# Here we "append" the $product into the array products
                }
            }
        break;
        case 'delete':
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                unset($_SESSION['products'][$_GET['id']]);
                header("Location: recap.php");exit;
            }
            break;
        case 'clear';
            if (isset($_SESSION['products'])) {
                unset($_SESSION["products"]);
                header("Location: recap.php");exit;
            }
        break;
        case 'qtt up';
        break;
        case 'qtt down';
        break;
    }


}
// if (isset($_GET['action']) && $_GET['action'] === 'delete') {
//     unset($_SESSION['products'][$product]);

// }

header("location:index.php"); //# This sends a response to our index.php so that the user can redo the form, if say you header it to recap then you will just showcase the result but prevent the user from new form submission
//! DO NOT OUTPUT ANYTHING (echo print or HTML) BEFORE THE HEADER AS IT WILL BUG OUT THE CODE
//! ALSO REMEMBER THAT THE SCRIPT WILL BE RUNNING AFTER THIS SO EITHER MAKE HEADER LAST THING OR MAKE die() OR exit() FUNCTION 