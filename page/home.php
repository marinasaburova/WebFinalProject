<?php
include 'view/header.php';
include 'view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
  <div class="row">

    <div class="py-3 text-center">
      <h2><?php echo ucfirst($category) ?></h2>
      <?php if ($color != 'all') echo "<span class='lead mb-4 mx-2'>Color:<i> $color </i></span>"
      ?>
      <?php if ($material != 'all') echo "<span class='lead mb-4 mx-2'>Material:<i> $material </i></span>"
      ?>
      <?php if (isset($searchterm)) echo "<span class='lead mb-4'>Searching for:<i> $searchterm </i></span>"
      ?>
    </div>

    <!-- Sidebar -->
    <?php include 'view/sidebar.php'; ?>

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
  <!-- /.row -->
</div>
<!-- /.middle container -->

<?php
include 'view/footer.php';
?>