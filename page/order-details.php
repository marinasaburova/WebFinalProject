<!-- Shows details about a specific order -->
<!-- User needs to be logged in to see -->
<?php
//require_once('utils/verify-login.php');
include('view/header.php');
include('view/navigation.php')
?>

<div class="container-fluid">
    <main>
        <!-- Title -->
        <div class="py-5 text-center">
            <h2>Order Details</h2>
            <p class="lead">Take a look at your order!</p>
        </div>

        <div class="container-fluid">
            <!-- Shipping Address -->

            <div class="py-0 text-center w-25 mx-auto">
                <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                    <!-- Shipping Address -->
                    <div class="card-body">
                        <h5 class="card-title"><b>Shipped To</b></h5>
                        <p class="card-text my-0"><?php echo $order['shipFirstName'] . ' ' . $order['shipLastName'] ?></p>
                        <p class="card-text my-0"><?php echo $order['shipStreet'] ?></p>
                        <p class="card-text my-0"><?php if (isset($order['shipStreet2'])) echo $order['shipStreet2'] ?></p>
                        <p class="card-text my-0"><?php echo $order['shipCity'] . ', ' . $order['shipState'] . ' ' . $order['shipZip'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="py-0 text-center w-25 mx-auto">
                <div class="card sticky-top bg-white mb-4 border-success" style="top: 72px">
                    <div class="card-body">
                        <h6 class="card-title my-0"><?php echo $order['status'] ?></h6>
                    </div>
                </div>
            </div>
            <!-- ./status -->

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
                                <p class="text-muted my-0">$<?php echo ($item['price'] * $item['quantity']) ?></p>
                                <small class="opacity-50 my-0">$<?php echo $item['price'] . ' * ' . $item['quantity'] ?></small>

                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <!-- Order Totals -->
            <div class="my-4 text-center w-25 mx-auto">
                <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                    <div class="card-body">
                        <h5 class="card-title"><b>Order Total</b></h5>
                        <p class="card-text my-0">Item Total: $<?php echo $order['itemsPrice'] ?></p>
                        <p class="card-text my-0">Tax: $<?php echo $order['tax'] ?></p>
                        <p class="card-text my-0">Shipping: $<?php echo $order['shipping'] ?></p>
                        <p class="card-text my-0">Total: $<?php echo ($order['itemsPrice'] + $order['tax'] + $order['shipping']) ?></p>
                    </div>
                </div>
            </div>
    </main>
</div>

<?php include('view/footer.php') ?>