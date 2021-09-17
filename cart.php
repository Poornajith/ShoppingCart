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
                    <form action="cart.php" method="get" class="cart-items">
                        <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3">
                                    <img src="./upload/product1.jpg" alt="image1" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="pt-2">Product1</h5>
                                    <small class="text-secondary">Seller : dailytution</small>
                                    <h5 class="pt-2">$599</h5>
                                    <button type="submit" class="btn btn-warning">Save for Later</button>
                                    <button type="submit" class ="btn btn-danger mx2" name="remove">Remove</button>

                                </div>
                                <div class="col-md-3 py-5">
                                    <div>
                                        <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                        <input type="text" value="1" class="form-control w-25 d-inline" >
                                        <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>