<!-- Register for an account-->

<?php
include('view/header.php');
include('view/navigation.php')
?>

<body>
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-4"></div>
      <!-- Center column-->
      <div class="col-sm-4">
        <main class="form-signin">
          <!-- Register form -->
          <form action=".#view" class="needs-validation" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <input type="hidden" name="action" value="register">
            <div class="form-floating my-2">
              <input type="text" name="firstName" class="form-control" id="floatingFirstName" maxlength="30" placeholder="Type your first name" required>
              <label for="floatingFirstName">First Name</label>
            </div>
            <div class="form-floating my-2">
              <input type="text" name="lastName" class="form-control" id="floatingLastName" maxlength="30" placeholder="Type your last name" required>
              <label for="floatingLastName">Last Name</label>
            </div>
            <div class="form-floating my-2">
              <input type="email" name="email" class="form-control" id="floatingInput" maxlength="60" placeholder="name@example.com" required>
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating my-2">
              <input type="password" name="password" class="form-control" id="floatingPassword" maxlength="60" placeholder="Create a Password" required>
              <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating my-2">
              <input type="password" name="password2" class="form-control" id="floatingPassword2" maxlength="60" placeholder="Confirm Password" required>
              <label for="floatingPassword2">Confirm Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

            <a href=".?action=login">
              <p class="mt-4 mb-3 text-muted">Login</p>
            </a>
            <a href=".?action=order-search">
              <p class="mt-2 mb-5 text-muted">Find order by number</p>
            </a>
          </form>
          <!-- ./register form -->
        </main>
        <!-- ./main -->
      </div>
      <!-- ./center column -->
      <div class="col-sm-4"></div>
    </div>
  </div>
  </main>
  </div>
  <?php include('view/footer.php') ?>
</body>

</html>