<!-- Displays details for a specific product -->
<!-- Use GET for this page, so that users can bookmark it -->

<?php
include 'view/header.php';
include 'view/navigation.php';
if (empty($product)) {
  $error = 'Product not found';
  include 'view/error.php';
  exit;
}
?>
<!-- Middle Container -->
<div class="container">
  <main>
    <div class="row">
      <!-- Main Content -->
      <div class="col-md-5">
        <div class="card mb-4 sticky-top" style="top: 72px; z-index:1018;">
          <img class=" card-img-top" src="<?php echo getItemImage($product['itemID']) ?>" alt="Image of product" />

        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-7">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product['name'] ?></h5>
            <p class="card-text">$<?php echo $product['price'] ?></p>
            <form action="." method="post" class="needs-validation">
              <input type="hidden" class="form-control" id="action" name="action" value="add-to-cart" />
              <input type="hidden" class="form-control" id="itemid" name="itemid" value="<?php echo $product['itemID'] ?>" />
              <input type="hidden" class="form-control" id="quantity" name="quantity" value="1" />
              <?php if ($product['quantity'] <= 0) echo '<button class="btn btn-secondary" type="submit" disabled>Out of Stock</button>' ?>
              <?php if ($product['quantity'] > 0) echo '<button class="btn btn-primary" type="submit" >Add to cart</button>' ?>
            </form>

            <?php if (isset($message)) { ?><p class="text-success pt-2"><?php echo $message ?></p> <?php } ?>
            <?php if (isset($outofstock_msg)) { ?><p class="text-danger pt-2"><?php echo $outofstock_msg ?></p> <?php } ?>
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