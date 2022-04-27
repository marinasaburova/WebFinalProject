<!-- Displays all products based on filters/categories -->
<!-- Use GET for this page, so that users can bookmark it -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/17b17c0b96.js" crossorigin="anonymous"></script>

  <title>Kelarina Accessories</title>
</head>

<body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
    Launch demo modal
  </button>

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
              <p><?php echo $login_message;
                  ?></p>
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
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>