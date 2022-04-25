<!-- Displays options to edit account and change password -->
<?php
require_once('utils/verify-login.php');
include('view/header.php');
include('view/navigation.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Edit Account</h2>
      <p class="lead">Change and update all your account info beauty.</p>
    </div>

    <!-- General Info -->
    <div class="row g-5">
      <div class="col-md-3 col-lg-2"></div>
      <div class="col-md-6 col-lg-8">
        <form class="needs-validation">
          <h4 class="mb-3 pt-1">Personal Information</h4>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="email" placeholder="(123)-456-7890">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Password</label>
              <input type="text" class="form-control" id="address" placeholder="Change password">
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

            <hr class="my-4">
        </form>

        <form action="." class="needs-validation" novalidate>
          <h4 class="mb-3 pt-1">Shipping Information</h4>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country">
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state">
                <option value="">Choose...</option>
                <option>California</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="">
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

          <hr class="my-4">

        </form>

        <form class="needs-validation" novalidate>

          <h4 class="mb-3">Payment Information</h4>

          <h5 class="mb-3">Billing Address</h5>

          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Billing address is the same as my shipping address</label>
          </div>

          <hr class="my-4">

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country">
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state">
                <option value="">Choose...</option>
                <option>California</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="">
            </div>
          </div>

          <hr class="my-4">

          <h5 class="mb-3">Card Information</h5>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input">
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="">
              <small class="text-muted">Full name as displayed on card</small>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="">
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="">
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="">
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
        </form>
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-lg-2"></div>
    </div>
    <!-- ./row -->
    <!-- ./General Information -->
  </main>
</div>
<?php include('view/footer.php') ?>
</body>

</html>