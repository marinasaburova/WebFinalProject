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
      <p class="lead" id="personal">Change and update all your account info beauty.</p>
    </div>

    <!-- General Info -->
    <div class="row g-5">
      <div class="col-md-3 col-lg-2"></div>
      <div class="col-md-6 col-lg-8">
        <!-- Personal Form -->
        <form action="." method="post" class="needs-validation">
          <h4 class="mb-3 pt-1">Personal Information</h4>

          <?php
          if (isset($_GET['msg']) && $_GET['msg'] == 'acctsuccess') {
            echo "<p class='text-success'>Account info has been updated!</p>";
          }
          if (isset($_GET['msg']) && $_GET['msg'] == 'accterror') {
            echo "<p class='text-danger'>This email is already in use.</p>";
          }
          ?>

          <input type="hidden" name="action" value="update-personal">

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" maxlength="30" required placeholder="" value="<?php echo $info['firstName'] ?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" maxlength="30" required placeholder="" value="<?php echo $info['lastName'] ?>">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" maxlength="60" required placeholder="" value="<?php echo $info['email'] ?>">
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

            <hr class="my-4" id="password">
          </div>
        </form>
        <!-- ./personal form -->

        <!-- Password Form -->
        <form action="." method="post" class="needs-validation" oninput='newPassword2.setCustomValidity(newPassword2.value != newPassword.value ? "Passwords do not match." : "")'>
          <h4 class="mb-3 pt-1">Password</h4>

          <?php
          if (isset($_GET['msg']) && $_GET['msg'] == 'pwdsuccess') {
            echo "<p class='text-success'>Password has been updated!</p>";
          }
          ?>

          <input type="hidden" name="action" value="update-password">
          <input type="hidden" name="email" value="<?php echo $info['email'] ?>">

          <div class="row g-3">
            <div class="col-12">
              <label for="currentPassword" class="form-label">Current Password</label>
              <input type="password" class="form-control" id="currentPassword" maxlength="60" name="currentPassword" required>
            </div>

            <?php
            if (isset($_GET['msg']) && $_GET['msg'] == 'pwderror') {
              echo "<p class='text-danger mb-0'>Wrong current password.</p>";
            }
            ?>

            <div class="col-12">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword" maxlength="60" required>
            </div>

            <div class="col-12">
              <label for="newPassword2" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="newPassword2" name="newPassword2" maxlength="60" required>
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

            <hr class="my-4">
          </div>
        </form>
        <!-- ./password form -->

        <!-- Address Form -->
        <form action="." method="post" class="needs-validation">
          <h4 class="mb-3 pt-1">Shipping Information</h4>

          <input type="hidden" name="action" value="update-shipping">

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required maxlength="30" value="<?php echo ($info['shipFirstName'] ?? ($info['firstName'] ?? '')) ?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label></label>
              <input type="text" class="form-control" id="lastName" name="lastName" required maxlength="30" value="<?php echo ($info['shipLastName'] ?? ($info['lastName'] ?? ''))  ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Street</label>
              <input type="text" class="form-control" id="street" name="street" required placeholder="1234 Main St" maxlength="30" value="<?php echo ($info['shipStreet'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Street 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="street2" name="street2" placeholder="Apartment or suite" maxlength="30" value="<?php echo ($info['shipStreet2'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" required maxlength="30" value="<?php echo ($info['shipCity'] ?? '') ?>">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" minlength="2" maxlength="2" id="state" name="state" required pattern="[a-zA-Z]{2}" value="<?php echo ($info['shipState'] ?? '') ?>">
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" minlength="5" maxlength="5" required pattern="[0-9]{5}" value="<?php echo ($info['shipZip'] ?? '') ?>">
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>

            <hr class="my-4">
          </div>
        </form>
        <!-- ./address form -->
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