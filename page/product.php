<!-- Displays details for a specific product -->
<!-- Use GET for this page, so that users can bookmark it -->

<?php
include 'view/header.php';
include 'view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
  <main>
    <div class="row">
      <!-- Main Content -->
      <div class="col-md-5">
        <div class="card mb-4 sticky-top" style="top: 72px; z-index:1018;">
          <img class=" card-img-top" src="media/purse.jpg" alt="Image of product" />

        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-7">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product['name'] ?></h5>
            <p class="card-text">Price: $<?php echo $product['price'] ?></p>
            <a href="#" class="btn btn-primary">Add to cart</a>
            <p class="card-text pt-3"><?php echo $product['description'] ?>

          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </main>
  <!-- /.main -->
</div>
<!-- /.middle container -->

<?php
include 'view/footer.php';
?>