<!-- Register for an account -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <title>Register</title>
</head>

<body>
  <?php include('../view/header.php') ?>
  <?php include('../view/navigation.php') ?>

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

              <!-- email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
              </div>
              <!-- password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" placeholder="" required>
              </div>

              <!-- confirm password -->
              <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
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
  <?php include('../view/footer.php') ?>
</body>

</html>