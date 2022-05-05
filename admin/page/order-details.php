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

    <!-- Shipping Address -->
    <div class="pb-5 pt-2 text-center w-75 mx-auto">
        <div class="card-body">
            <div class="container text-center">
                <div class="row">
                    <!-- main column-->
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="." method="post" enctype="multipart/form-data">
                            <div class="row g-3">

                                <input type="hidden" name="action" value="update-order">
                                <input type="hidden" name="orderID" value="<?php echo $order['orderID'] ?>">
                                <div class="col-12">
                                    <label for="status" class="form-label">Order Status: </label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option selected value="<?php echo $order['status'] ?>"><?php echo ucfirst($order['status']) ?></option>
                                        <option value="placed">Placed</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="delayed">Delayed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email" maxlength="60" placeholder="you@example.com" value="<?php echo $order['email'] ?>">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipStreet" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="shipStreet" name="shipStreet" maxlength="30" placeholder="1234 Main St" value="<?php echo $order['shipStreet'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipStreet2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="shipStreet2" name="shipStreet2" maxlength="30" placeholder="Apartment or suite" value="<?php echo $order['shipStreet2'] ?>">
                                </div>

                                <div class="col-12">
                                    <label for="shipCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="shipCity" name="shipCity" maxlength="30" placeholder="1234 Main St" value="<?php echo $order['shipCity'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your city.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="shipState" name="shipState" maxlength="2" minlength="2" value="<?php echo $order['shipState'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="shipZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="shipZip" name="shipZip" minlength="5" maxlength="5" value="<?php echo $order['shipZip'] ?>" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>

                                <button class="w-100 btn btn-primary btn-lg" type="submit" name="updateOrder">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4"></div>
            </div>
            <!-- ./row -->
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