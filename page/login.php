<!-- Login page for customers -->

<?php
include('view/header.php');
include('view/navigation.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Login</h2>
    </div>

    <div class="mb-3">
      <!-- General Info -->
      <div>
        <form class="needs-validation" novalidate>

          <div class="mb-3">

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="text" class="form-control" id="password" placeholder="" required>
            </div>

            <a href="register.html">Register</a>

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