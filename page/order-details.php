<!-- Shows details about a specific order -->
<!-- User needs to be logged in to see -->

<?php include('view/header.php') ?>
<?php include('view/navigation.php') ?>

<div class="container-fluid">
    <main>
        <!-- Title -->
        <div class="py-5 text-center">
            <h2>Your Order</h2>
            <p class="lead">So cute, girl!</p>
        </div>

        <!-- Shipping Address -->
        <div class="py-0 text-center w-25 mx-auto">
            <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                <div class="card-body">
                    <h5 class="card-title">Shipped To</h5>
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
                <img src="media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 1</h6>
                        <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 2</h6>
                        <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="media/purse.jpg" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Item 3</h6>
                        <p class="mb-0 opacity-75">$quantity</p>
                    </div>
                    <small class="opacity-50 text-nowrap">$price</small>
                </div>
            </a>
        </div>

        <!-- Order Totals -->
        <div class="my-4 text-center w-25 mx-auto">
            <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
                <div class="card-body">
                    <h5 class="card-title">Order Total</h5>
                    <p class="card-text">$itemTotal</p>
                    <p class="card-text">$tax</p>
                    <p class="card-text">$shipping</p>
                    <p class="card-text">$total</p>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include('view/footer.php') ?>