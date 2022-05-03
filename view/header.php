<!-- Displays all products based on filters/categories -->
<!-- Use GET for this page, so that users can bookmark it -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="bootstrap/css/main.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/17b17c0b96.js" crossorigin="anonymous"></script>

  <title>Kelarina Accessories</title>
</head>

<body>
  <!-- Container -->
  <div class="container-fluid">

    <!-- Mini Nav -->
    <div class="container d-flex justify-content-end flex-wrap sticky-top" style="z-index: 1022; top:14px">
      <ul class="nav">
        <li class="nav-item"><a href=".?action=cart#view" class="nav-link link-dark px-2"><i class="fa-solid fa-cart-shopping"></i></a></li>
        <li class="nav-item"><a href=".?action=account#view" class="nav-link link-dark px-2"><i class="fa-solid fa-circle-user"></i></a></li>
        <?php
        if (isset($_SESSION['loggedin'])) { ?>
          <li class="nav-item"><a href=".?action=logout" class="nav-link link-dark px-2"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
        <?php } ?>
      </ul>
    </div>
    <!-- Header -->
    <div class="px-4 py-5 mb-5 mt-2 text-center position-relative">
      <h1 class="display-5 fw-bold">Kelarina</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Accessories and more. </p>
      </div>
      <a href="." class="stretched-link"></a>
    </div>
    <!-- /.header -->