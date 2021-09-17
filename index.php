<?php 
// start session
session_start();



require_once ('php/CreateDb.php');
require_once ('./php/component.php');

//create instance of createDb class
$database = new CreateDb("Productdb", "Producttb");

if(isset($_POST['add'])){
   //print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){

    $item_array_id = array_column($_SESSION['cart'], "product_id");
   
   
    if(in_array($_POST['product_id'], $item_array_id)){
        echo"<script>alert('Product is already in the cart..!')</script>";
        echo "<script>  window.location = 'index.php' </script>";
    }else{
        $count = count($_SESSION['cart']);
        $item_array =(
            $datax['product_id']=$_POST['product_id'] // stackoverflow
           // 'product_id' => $_POST['product_id'] --tutorial
          
          );
          $_SESSION['cart'][$count]=$item_array;
          print_r($_SESSION['cart']);
    
    }

   }else{
       $item_array =(
          $datax['product_id']=$_POST['product_id']
         // 'product_id' => $_POST['product_id']
        
        );
       //create new session variable

       $_SESSION['cart'][0] = $item_array;
       print_r($_SESSION['cart']);
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!--Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css" integrity="sha512-4wfcoXlib1Aq0mUtsLLM74SZtmB73VHTafZAvxIp/Wk9u1PpIsrfmTvK0+yKetghCL8SHlZbMyEcV8Z21v42UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!--Bootsrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php  
require_once ("php/header.php");
?>

<div class="container">
    <div class="row text-center py-5">
        <?php 
        $result= $database->getData();
        while ($row = mysqli_fetch_assoc($result)){
            component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
       
        ?>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>