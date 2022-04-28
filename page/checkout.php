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
      <h2>Checkout</h2>
      <p class="lead">These gorgeous items are almost yours.</p>
    </div>

    <div class="row g-5">
      <!-- Cart -->
      <div class="col-md-5 col-lg-4 order-md-last">
        <div class="sticky-top" style="top:72px; z-index: 1018">
          <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill"><?php echo $numOfItems ?></span>
          </h4>
          <ul class="list-group mb-3">

            <?php
            foreach ($cart as $item => $quantity) {
              $product = getProductDetails($item);
            ?>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0"><?php echo $product['name'] ?></h6>
                  <small class="text-muted"><?php echo '$' . $product['price'] . ' * ' . $quantity  ?></small>
                </div>
                <span class="text-muted">$<?php echo ($product['price'] * $quantity) ?></span>
              </li>

            <?php } ?>

          </ul>

          <ul class="list-group mb-3">

            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Product total</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $price ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Estimated Tax</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $tax ?>1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm bg-light">
              <div>
                <h6 class="my-0">Shipping</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php echo $shipping ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
              <span>Total (USD)</span>
              <strong>$<?php echo $total ?></strong>
            </li>

          </ul>

          <form class="card p-2" action=".#view">
            <div class="input-group">
              <input type="hidden" name="action" value="cart">
              <button class="w-100 btn btn-secondary" type="submit">Edit Cart</button>
            </div>
          </form>
        </div>
      </div>
      <!-- ./cart -->

      <!-- Billing & Shipping -->
      <div class="col-md-7 col-lg-8">
        <form action="." method="post" class="needs-validation">
          <input type="hidden" name="action" value="place-order">

          <!-- Shipping -->
          <h4 class="mb-3 pt-1">Shipping Address</h4>
          <div class="row g-3" id="shipping">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required placeholder="" value="<?php echo ($info['shipFirstName'] ?? ($info['firstName'] ?? '')) ?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label></label>
              <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="" value="<?php echo ($info['shipLastName'] ?? ($info['lastName'] ?? ''))  ?>">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="example@gmail.com" value="<?php echo ($info['email'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="street" class="form-label">Street</label>
              <input type="text" class="form-control" id="street" name="street" required placeholder="1234 Main St" value="<?php echo ($info['shipStreet'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="street2" class="form-label">Street 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="street2" name="street2" placeholder="" value=" <?php echo ($info['shipStreet2'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" required placeholder="" value="<?php echo ($info['shipCity'] ?? '') ?>">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" minlength="2" maxlength="2" id="state" name="state" required value="<?php echo ($info['shipState'] ?? '') ?>">
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" minlength="5" maxlength="5" required placeholder="" value="<?php echo ($info['shipZip'] ?? '') ?>">
            </div>

          </div>
          <!-- ./shipping -->

          <?php
          if (isset($_SESSION['loggedin'])) {  ?>
            <div class="form-check mt-4">
              <input type="checkbox" class="form-check-input" id="save-info" name="save-info" onclick="openModal()">
              <label class=" form-check-label" for="save-info">Save this as my default address</label>
            </div>
          <?php } else { ?>
            <div class="form-label mt-4">
              <a href=".?action=login" class=" form-check-label" for="save-info">Login to save your information</a>
            </div>
          <?php } ?>

          <hr class="my-4">

          <!-- Payment -->
          <h4 class="mb-3">Payment</h4>
          <div class="my-3" id="payment">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" value="credit" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" value="debit" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
          </div>

          <div class="row gy-3" id="payment2">
            <div class=" col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="password" class="form-control" minlength="16" maxlength="16" id="cardNum" name="cardNum" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="password" class="form-control" minlength="3" maxlength="4" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <!-- ./payment -->

          <hr class="my-4">

          <!-- Billing -->
          <h4 class="mb-3">Billing address</h4>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" name="same-address" onclick="fillBillingAddress()">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <hr class="my-4">

          <div class="row g-3" id="billing">
            <div class="col-sm-6">
              <label for="billFirstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="billFirstName" name="billFirstName" placeholder="" required>
            </div>

            <div class="col-sm-6">
              <label for="billLastName" class="form-label">Last name</label></label>
              <input type="text" class="form-control" id="billLastName" name="billLastName" placeholder="" required>
            </div>

            <div class="col-12">
              <label for="billStreet" class="form-label">Street</label>
              <input type="text" class="form-control" id="billStreet" name="billStreet" placeholder="1234 Main St" required>
            </div>

            <div class="col-12">
              <label for="billStreet2" class="form-label">Street 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="billStreet2" name="billStreet2" placeholder="Apartment or suite">
            </div>

            <div class="col-12">
              <label for="billCity" class="form-label">City</label>
              <input type="text" class="form-control" id="billCity" name="billCity" placeholder="" required>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="billState" class="form-label">State</label>
              <input type="text" class="form-control" minlength="2" maxlength="2" id="billState" name="billState" required>
            </div>

            <div class="col-md-3">
              <label for="billZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="billZip" name="billZip" minlength="5" maxlength="5" placeholder="" required>
            </div>
          </div>
          <!-- ./billing -->

          <button class="w-100 btn btn-primary btn-lg my-4" type="submit">Place Order</button>
        </form>
      </div>
      <!-- ./billing and shipping -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <main class="form-signin text-center">
              <form action=".#view" method="post">
                <h1 class="h3 mb-3 fw-normal">Login</h1>
                <p>Please log in or register to save your information.</p>
                <input type="hidden" name="action" value="modal">
                <div class="form-floating my-2">
                  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating my-2">
                  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox my-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <a href=".?action=register#view">
                  <p class="mt-4 mb-3 text-muted">Register</p>
                </a>
                <!--   <a href=".?action=order-search">
                <p class="mt-2 mb-3 text-muted">Find order by number</p>
              </a> -->
              </form>
            </main>
          </div>
        </div>
      </div>
    </div>
    <!-- ./modal -->

  </main>

  <script>
    function openModal() {}

    function fillBillingAddress() {

      // Get the checkbox
      var checkBox = document.getElementById("same-address");
      // Get the output text
      var div = document.getElementById("billing");

      // If the checkbox is checked, display the output text
      if (checkBox.checked == true) {
        div.className += " d-none";

        // make attributes optional
        document.getElementById("billFirstName").removeAttribute("required");
        document.getElementById("billLastName").removeAttribute("required");
        document.getElementById("billStreet").removeAttribute("required");
        document.getElementById("billCity").removeAttribute("required");
        document.getElementById("billState").removeAttribute("required");
        document.getElementById("billZip").removeAttribute("required");

      } else {
        div.className = div.className.replace(/(?:^|\s)d-none(?!\S)/g, '')

        // make attributes required
        document.getElementById("billFirstName").setAttribute("required", "true");
        document.getElementById("billLastName").setAttribute("required", "true");
        document.getElementById("billStreet").setAttribute("required", "true");
        document.getElementById("billCity").setAttribute("required", "true");
        document.getElementById("billState").setAttribute("required", "true");
        document.getElementById("billZip").setAttribute("required", "true");
      }
    }
  </script>

  <?php
  include 'view/footer.php';
  ?>