<!-- Shows order details and allows employee to change status -->
<?php
include 'admin-view/header.php';
include 'admin-view/navigation.php';
?>

<div class="py-5 text-center">
    <h2>Order Details</h2>
    <p class="lead">Edit and manage this order.</p>
</div>


<div class="container-fluid">
    <!-- Order Status -->
    <div class="py-5 text-center w-25 mx-auto">
        <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
            <div class="card-body">
                <h5 class="card-title">Order Status: </h5>
                <label for="country" class="form-label"></label>
                <select class="form-select" id="status" required>
                    <option value="<?php echo $order['status'] ?>"></option>
                    <option>Ordered</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                    <option>Delayed</option>
                    <option>Cancelled</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="py-5 text-center w-75 mx-auto">
        <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
            <div class="card-body">
                <h5 class="card-title">Shipping Address</h5>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <!-- main column-->
                        <div class="col-sm-4">
                            <form action="." method="post">
                                <h5 class="h3 mb-3 fw-normal">Change Address</h5>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $order['email'] ?>">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipStreet" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="shipStreet" placeholder="1234 Main St" value="<?php echo $order['shipStreet'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipStreet2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="shipStreet2" placeholder="Apartment or suite" value="<?php echo $order['shipStreet2'] ?>" required>
                                </div>

                                <p><br></p>


                                <div class="col-12">
                                    <label for="shipCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="shipCity" placeholder="1234 Main St" value="<?php echo $order['shipCity'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your city.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" required>
                                        <option value="<?php echo $order['shipState'] ?>">Choose...</option>
                                        <option>NJ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="shipZip" placeholder="" value="<?php echo $order['shipZip'] ?>" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>

                                <p><br></p>

                                <button class="w-100 btn btn-primary btn-lg" type="submit" name="updateOrder">Update</button>
                                <input type="hidden" name="action" value="update-order">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- List Items -->
    <div class="list-group w-50 mx-auto">
        <?php
        foreach ($items as $item) { ?>
            <a href=".?action=product&itemid=<?php echo $item['itemID'] ?>#view" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="<?php echo getItemImage($item['itemID']) ?>" alt="twbs" height="60px" class="rounded flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="my-0"><?php echo $item['name'] ?></h6>
                    </div>
                    <div>
                        <small class="opacity-50 my-0">$<?php echo $item['price'] . ' * ' . $item['quantity'] ?></small>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>

    <p><br></p>

</div>

<?php include('admin-view/footer.php') ?>