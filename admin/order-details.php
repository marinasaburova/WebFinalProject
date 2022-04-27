<!-- Shows order details and allows employee to change status -->

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
            <!-- Order Status -->
            <div class="py-5 text-center w-25 mx-auto">
                <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                <div class="card-body">
                    <h5 class="card-title">Order Status: </h5>
                    <label for="country" class="form-label"></label>
                    <select class="form-select" id="status" required>
                        <option value="">Choose...</option>
                        <option>Ordered</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                        <option>Delayed</option>
                        <option>Cencelled</option>
                    </select>
                </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="py-5 text-center w-75 mx-auto">
                <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                    <div class="card-body">
                        <h5 class="card-title">Shipping Address</h5>
                        <!--
                        <p class="card-text">$Addr1</p>
                        <p class="card-text">$City</p>
                        <p class="card-text">$State</p>
                        <p class="card-text">$Zip</p>
                        -->
                        <div class="container text-center">
                            <div class="row">
                              <div class="col-sm-4"></div>
                              <!-- main column-->
                              <div class="col-sm-4">
                                    <form method="post">
                                        <h5 class="h3 mb-3 fw-normal">Change Address</h5>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email </label>
                                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                            <div class="invalid-feedback">
                                                Please enter a valid email address for shipping updates.
                                            </div>
                                        </div>
                                  
                                        <div class="col-12">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                            <div class="invalid-feedback">
                                                Please enter your shipping address.
                                            </div>
                                        </div>
                                  
                                        <div class="col-12">
                                            <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                        </div>
            
                                        <p><br></p>
                                  
                                        <div class="col-12">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-select" id="country" required>
                                                <option value="">Choose...</option>
                                                <option>United States</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid country.
                                            </div>
                                        </div>
            
                                        <p><br></p>
                                  
                                        <div class="col-12">
                                            <label for="state" class="form-label">State</label>
                                            <select class="form-select" id="state" required>
                                                <option value="">Choose...</option>
                                                <option>California</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                  
                                        <div class="col-12">
                                            <label for="zip" class="form-label">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Zip code required.
                                            </div>
                                        </div>
            
                                        <p><br></p>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                        <p class="mb-0 opacity-75">
                            <label for="quanity" class="form-label"></label>
                            <input type="text" class="form-control" id="quanity" placeholder="quanity" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="../media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 1</h6>
                        <p class="mb-0 opacity-75">
                            <label for="quanity" class="form-label"></label>
                            <input type="text" class="form-control" id="quanity" placeholder="quanity" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="../media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 1</h6>
                        <p class="mb-0 opacity-75">
                            <label for="quanity" class="form-label"></label>
                            <input type="text" class="form-control" id="quanity" placeholder="quanity" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                    </div>
                </a>
            </div>

            <p><br></p>

        </div>

        <?php include ('../view/footer.php') ?>
    </body>
</html>