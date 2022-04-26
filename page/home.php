<?php
include 'view/header.php';
include 'view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <?php include 'view/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="col-md-9">
      <!-- Products -->
      <div class="row align-items-start justify-content-start text-center">
        <?php

        foreach ($products as $p) {
        ?>
          <div class="col-sm-6 col-md-4">
            <div class="card mb-4">
              <a href=".?action=product&itemid=<?php echo $p['itemID'] ?>#view"><img class="card-img-top" src="media/purse.jpg" alt="Image of product" /></a>
              <div class="card-body">
                <h5 class="card-title"><?php echo $p['name'] ?></h5>
                <p class="card-text">$<?php echo $p['price'] ?></p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>

        <?php
        }
        ?>
      </div>
      <!-- /.products -->

    </div>
    <!-- /.col main content -->
  </div>
  <!-- /.row -->
</div>
<!-- /.middle container -->

<?php
include 'view/footer.php';
?>