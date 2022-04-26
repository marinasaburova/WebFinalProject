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
        <form action="." method="post" class="needs-validation">
          <h4 class="mb-3 pt-1">Personal Information</h4>

          <input type="hidden" name="action" value="update-personal">

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required placeholder="" value="<?php echo $info['firstName'] ?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="" value="<?php echo $info['lastName'] ?>">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="you@example.com" value="<?php echo $info['email'] ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required placeholder="Change password">
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

            <hr class="my-4">
        </form>

        <form action="." method="post" class="needs-validation">
          <h4 class="mb-3 pt-1">Shipping Information</h4>

          <input type="hidden" name="action" value="update-shipping">

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" required placeholder="" value="<?php echo ($info['shipFirstName'] ?? ($info['firstName'] ?? '')) ?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label></label>
              <input type="text" class="form-control" id="lastName" required placeholder="" value="<?php echo ($info['shipLastName'] ?? ($info['lastName'] ?? ''))  ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" required placeholder="1234 Main St" value="<?php echo ($info['shipStreet'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="<?php echo ($info['shipStreet2'] ?? '') ?>">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" minlength="2" maxlength="2" id="state" name="state" required value="<?php echo ($info['shipState'] ?? '') ?>">
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" required placeholder="" value="<?php echo ($info['shipZip'] ?? '') ?>">
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

          <hr class="my-4">

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