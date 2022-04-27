<!-- Show's users cart and lets them edit it -->

<!-- Displays details for a specific product -->
<!-- Use GET for this page, so that users can bookmark it -->

<?php
include 'view/header.php';
include 'view/navigation.php';

$cart = $_SESSION['cart'];

$price = getCartTotal();
$tax = $price * .05;
$shipping = 5;
$total = $price + $tax + $shipping;

$numOfItems = 0;
foreach ($cart as $item => $quantity) {
  $numOfItems += $quantity;
}

?>


<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Order Confirmation</h2>
      <p class="lead">Yay! Congrats on your new purchase.</p>
    </div>

    <div class="row g-5">
      <!-- Cart -->
      <div class="col-md-5 col-lg-4">
        <div class="sticky-top" style="top:72px; z-index: 1018">
          <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
            <span class="text-primary">Shipping & Billing</span>
          </h4>

          <ul class="list-group mb-3">

            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Shipping to</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">
                <?php echo $order['shipFirstName'] . ' ' . $order['shipLastName'] . '</br>' ?>
                <?php echo $order['shipStreet'] . '</br>' ?>
                <?php if (isset($order['shipStreet2'])) {
                  echo $order['shipStreet2'] . '</br>';
                } ?>
                <?php echo $order['shipCity'] . ', ' . $order['shipState'] . ' ' . $order['shipZip'] ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Billing to</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">Address<?php echo $tax ?>1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Payment Info</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $shipping ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
              <span>Total (USD)</span>
              <strong>$<?php echo $total ?></strong>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./cart -->

      <div class="col-md-5 col-lg-4">
        <div class="sticky-top" style="top:72px; z-index: 1018">
          <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
            <span class="text-primary">Order Total</span>
          </h4>

          <ul class="list-group mb-3">

            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Product total</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $order['itemsPrice'] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Tax</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $order['tax'] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Shipping</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $order['shipping'] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
              <span>Total (USD)</span>
              <strong>$<?php echo ($order['itemsPrice'] + $order['tax'] + $order['shipping']) ?></strong>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./cart -->

      <div class="col-md-5 col-lg-4 order-md-last">
        <div class="sticky-top" style="top:72px; z-index: 1018">
          <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
            <span class="text-primary">Items Ordered</span>
          </h4>
          <ul class="list-group mb-3">

            <?php
            foreach ($items as $item) {
            ?>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0"><?php echo $item['name'] ?></h6>
                  <small class="text-muted"><?php echo '$' . $item['price'] . ' * ' . $item['quantity']  ?></small>
                </div>
                <span class="text-muted">$<?php echo ($item['price'] * $item['quantity']) ?></span>
              </li>

            <?php } ?>
          </ul>

        </div>
      </div>
      <!-- ./cart -->
    </div>
    <!-- ./row -->
  </main>

  <script>
    function fillBillingAddress() {

      // Get the checkbox
      var checkBox = document.getElementById("same-address");
      // Get the output text
      var div = document.getElementById("billing");

      // If the checkbox is checked, display the output text
      if (checkBox.checked == true) {
        div.className += " d-none";

      } else {
        div.className = div.className.replace(/(?:^|\s)d-none(?!\S)/g, '')
      }
    }
  </script>

  <?php
  include 'view/footer.php';
  ?>