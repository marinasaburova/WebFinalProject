<!-- Shows item details and allows employee to edit them -->

<?php
include 'admin-view/header.php';
include 'admin-view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
  <main>
    <div class="row">
      <!-- Main Content -->
      <div class="col-md-5">
        <div class="card mb-4 sticky-top" style="top: 72px; z-index:1018;">
          <img class=" card-img-top" src="../../media/purse.jpg" alt="Image of product" />
        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-7">
        <div class="card mb-4">
          <div class="card-body">
            <div class="container text-center">
              <div class="row">
                <div class="col-sm-4"></div>
                <!-- main column-->
                <div class="col-sm-4">
                  <form method="post">
                    <p class="card-text">Product name: </p>
                    <label for="productName" class="form-label"></label>
                    <input type="text" class="form-control" id="productName" placeholder="" required>
                    <div class="invalid-feedback">
                      Please enter product name.
                    </div>
                    <br>
                    <p class="card-text">Price: $</p>
                    <label for="price" class="form-label"></label>
                    <input type="text" class="form-control" id="price" placeholder="" required>
                    <div class="invalid-feedback">
                      Please enter price.
                    </div>
                    <br>
                    <p class="card-text pt-3">Description...</p>
                    <label for="description" class="form-label"></label>
                    <input type="text" class="form-control" id="description" placeholder="" required>
                    <div class="invalid-feedback">
                      Please enter description.
                    </div>
                    <br>
                    <a href="#" class="btn btn-primary">Update</a>
                  </form>
                </div>
              </div>
            </div>
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
include('admin-view/footer.php');
?>