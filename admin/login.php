<!-- Login page for customers -->

<?php
include('../admin-view/header.php');
include('../admin-view/navigation.php');
?>

<div class="container text-center">
  <div class="row">
    <div class="col-sm-4"></div>
    <!-- main column-->
    <div class="col-sm-4">
      <main class="form-signin">
        <form action=".#admin-view" method="post">
          <h1 class="h3 mb-3 fw-normal">Login</h1>
          <p><?php echo $login_message; ?></p>
          <input type="hidden" name="action" value="login">
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
          <a href=".?action=register#admin-view">
            <p class="mt-4 mb-3 text-muted">Register</p>
          </a>
          <a href=".?action=../page/login.php#admin-view">
            <p class="mt-4 mb-3 text-muted">Customer Login</p>
          </a>
        </form>
      </main>
    </div>
    <!-- ./col -->
    <div class="col-sm-4"></div>
  </div>
  <!-- ./row -->
</div>
<?php include('../admin-view/footer.php') ?>
</body>

</html>