<!-- Shows details about a specific order -->
<!-- User needs to be logged in to see -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
            crossorigin="anonymous"
        >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
            crossorigin="anonymous">
        </script>
        <title>Login</title>

        <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
            }
        </style>

        <?php include('../view/header.php') ?>
        <?php include('../view/navigation.php')?>

    </head>

    <body>
        <div class="py-5 text-center">
            <h2>Your Order</h2>
            <p class="lead">So cute, girl!</p>
          </div>


        <div class="container-fluid">
            <!-- Shipping Address -->
            
            <div class="py-5 text-center w-25 mx-auto">
                <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                <div class="card-body">
                    <h5 class="card-title">Shipping Address</h5>
                    <p class="card-text">$Addr1</p>
                    <p class="card-text">$City</p>
                    <p class="card-text">$State</p>
                    <p class="card-text">$Zip</p>
                </div>
                </div>
            </div>

            <!-- List Items -->
            <div class="list-group w-50 mx-auto">
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="../media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                    <h6 class="mb-0">Item 1</h6>
                    <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="../media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 2</h6>
                        <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="../media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 3</h6>
                        <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                    </div>
                </a>
            </div>
        </div>

        <?php include ('../view/footer.php') ?>
    </body>
</html>