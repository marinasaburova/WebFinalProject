<!-- Shows current store inventory -->

<?php
include 'admin-view/header.php';
include 'admin-view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
    <main>
        <div class="py-5 text-center">
            <h2>Inventory</h2>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <?php include 'admin-view/inv-sidebar.php'; ?>

     <!-- Main Content -->
     <div class="col-md-9">
      <!-- Products -->
      <div class="row align-items-start justify-content-start text-center">

        <!-- if no products found -->
        <?php
        if (empty($products)) { ?>
          <div class="col-md-8">
            <p>No products found.</p>
          </div>
        <?php } ?>

        <!-- List all products -->
        <?php
        foreach ($products as $p) {
        ?>
          <div class="col-sm-6 col-md-4">
            <div class="card mb-4">
              <a href=".?action=product&itemid=<?php echo $p['itemID'] ?>#view"><img class="card-img-top" src="<?php echo getItemImage($p['itemID']) ?>" alt="Image of product" height="360px" style="object-fit: cover" /></a>
              <div class="card-body">
                <h5 class="card-title"><?php echo $p['name'] ?></h5>
                <p class="card-text">$<?php echo $p['price'] ?></p>
                <form action="." method="post" class="needs-validation">
                  <input type="hidden" class="form-control" id="action" name="action" value="home-add-to-cart" />
                  <input type="hidden" class="form-control" id="itemid" name="itemid" value="<?php echo $p['itemID'] ?>" />
                  <input type="hidden" class="form-control" id="quantity" name="quantity" value="1" />
                  <button class="btn btn-primary" type="submit">Add to cart</button>
                </form>
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
<!-- /.middle container -->

<?php
include 'admin-view/footer.php';
?>