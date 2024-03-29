<!-- Confirmation of order -->

<?php
include 'view/header.php';
include 'view/navigation.php';

$cart = $_SESSION['cart'];

$price = number_format(getCartTotal(), 2);
$tax = number_format($price * .05, 2);
$shipping = number_format(5, 2);
$total = number_format($price + $tax + $shipping, 2);

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
      <?php if (isset($update_message)) {
        echo "<div class='alert alert-success' role='alert'>$update_message</div>";
      } ?>
    </div>

    <div class="row g-5">
      <!-- Cart -->
      <div class="col-md-5 col-lg-4">
        <div class="sticky-top" style="top:72px; z-index: 1018">
          <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
            <span class="text-primary">Shipping & Billing</span>
          </h4>

          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Shipping to</h6>
                <small class="text-muted"></small>
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
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Billing to</h6>
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">
                <?php echo $billFirstName . ' ' . $billLastName . '</br>' ?>
                <?php echo $billStreet . '</br>' ?>
                <?php if (isset($billStreet2)) {
                  echo $billStreet2 . '</br>';
                } ?>
                <?php echo $billCity . ', ' . $billState . ' ' . $billZip ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Payment Info</h6>
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">Method: <?php echo $paymentMethod . '</br>' ?>
                <?php echo $cardNum ?></span>
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

            <li class="list-group-item d-flex justify-content-between lh-sm bg-light pb-4">
              <div>
                <h6 class="my-0">Product total</h6>
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">$<?php echo number_format($order['itemsPrice'], 2) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light pb-4">
              <div>
                <h6 class="my-0">Tax</h6>
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">$<?php echo number_format($order['tax'], 2) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light pb-4">
              <div>
                <h6 class="my-0">Shipping</h6>
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">$<?php echo number_format($order['shipping'], 2) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
              <span>Total (USD)</span>
              <strong>$<?php echo number_format(($order['itemsPrice'] + $order['tax'] + $order['shipping']), 2) ?></strong>
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
                  <small class="text-muted"><?php echo '$' . number_format($item['price'], 2) . ' * ' . $item['quantity']  ?></small>
                </div>
                <span class="text-muted">$<?php echo number_format(($item['price'] * $item['quantity']), 2) ?></span>
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