<!-- Login page for customers -->

<?php
include('view/header.php');
include('view/navigation.php');
?>

<div class="container text-center">
  <div class="row mt-3">
    <div class="col-sm-4"></div>
    <!-- main column-->
    <div class="col-sm-4">
      <main class="form-signin">
        <form action=".#view" method="post">
          <h1 class="h3 mb-3 fw-normal">Login</h1>
          <p><?php echo $login_message; ?></p>
          <input type="hidden" name="action" value="login">
          <div class="form-floating my-2">
            <input type="email" name="email" class="form-control" id="floatingInput" maxlength="60" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating my-2">
            <input type="password" name="password" class="form-control" id="floatingPassword" maxlength="60" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox my-3">

          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <a href=".?action=register#view">
            <p class="mt-4 mb-3 text-muted">Register</p>
          </a>
          <a href=".?action=order-search">
            <p class="mt-2 mb-5 text-muted">Find order by number</p>
          </a>
        </form>
      </main>
    </div>
    <!-- ./col -->
    <div class="col-sm-4"></div>
  </div>
  <!-- ./row -->
</div>
<?php include('view/footer.php') ?>
</body>

</html>