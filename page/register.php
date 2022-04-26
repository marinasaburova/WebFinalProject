<!-- Register for an account-->

<?php
include('view/header.php');
include('view/navigation.php')
?>

<body>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Register</h2>
      </div>

      <div class="mb-3">
        <!-- General Info -->
        <div>
          <form class="needs-validation" novalidate>

            <div class="mb-3">
              <!-- first name -->
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Type in your first name..." required>
              </div>

              <!-- last name -->
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Type in your last name.." required>
              </div>

              <!-- email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              </div>
              <!-- password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
              </div>

              <!-- confirm password -->
              <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm password..." required>
              </div>

              <a href="register.php">Register</a>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Login</button>
          </form>
        </div>
        <!-- ./General Information -->
      </div>
    </main>
  </div>
  <?php include('view/footer.php') ?>
</body>

</html>