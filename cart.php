<?php
session_start();
require_once ('php/createDb.php');
require_once ('php/component.php');

$db = new CreateDb("Productdb", "Producttb");
 if(isset($_POST['remove'])){
     if($_GET['action'] == 'remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($value['product_id'] == $_GET['id']){
                 unset($_session['cart'][$key]);
                 echo "<script> alert ('Product has been Removed...!')</script>";
                 echo "<script> window.location ='cart.php'</script>";
             }
         }
     }
 } 




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!--Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css" integrity="sha512-4wfcoXlib1Aq0mUtsLLM74SZtmB73VHTafZAvxIp/Wk9u1PpIsrfmTvK0+yKetghCL8SHlZbMyEcV8Z21v42UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!--Bootsrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body class="bg-light">
    <?php
    require_once('php/header.php');


    ?>
    
    <div class="container-fluid">
        <div class="row px-5">
            <div class="c0l-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                        <?php

                            $total = 0;

                           if(isset($_SESSION['cart'])){
                            $product_id = array_column($_SESSION['cart'], 'product_id');

                            $result = $db->getData();
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['id'] == $id){
                                        cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                        $total =$total + (int)$row['product_price'];
                                    }
                                }
                            }
                           }else{
                               echo"<h5> Cart is Empty <?h5>";
                           }


                        ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<h6>Price (".$count." Items)</h6>";
                                }else{
                                    echo "<h6>Price 0 Items</h6>";
                                }
                            
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                                <h6><?php 
                                echo "Total Price : $ ".$total;
                                
                                ?></h6>
                                <h6 class="text-success">
                                    FREE </h6>
                                    <hr>
                                <h6>$ <?php  
                                echo $total;
                                ?></h6>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>