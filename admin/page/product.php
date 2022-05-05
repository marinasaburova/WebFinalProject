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
          <img class=" card-img-top" src="<?php echo getItemImage($product['itemID']) ?>" alt="Image of product" />
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
                  <form action="." method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update-product">

                    <p class="card-text">Product name: </p>
                    <label for="productName" class="form-label"></label>
                    <input type="text" class="form-control" id="productName" name="name" placeholder="" value="<?php echo $product['name'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter product name.
                    </div>
                    <br>
                    <p class="card-text">Price: </p>
                    <label for="price" class="form-label"></label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $product['price'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter price.
                    </div>
                    <br>
                    <p class="card-text">Quantity: </p>
                    <label for="quantity" class="form-label"></label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="" value="<?php echo $product['quantity'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter quantity.
                    </div>
                    <br>
                    <p class="card-text">Category: </p>
                    <label for="category" class="form-label"></label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="" value="<?php echo $product['category'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter category.
                    </div>
                    <br>
                    <p class="card-text pt-3">Color: </p>
                    <label for="color" class="form-label"></label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="" value="<?php echo $product['color'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter color.
                    </div>
                    <br>
                    <p class="card-text pt-3">Material: </p>
                    <label for="material" class="form-label"></label>
                    <input type="text" class="form-control" id="material" name="material" placeholder="" value="<?php echo $product['material'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter material.
                    </div>
                    <br>
                    <p class="card-text pt-3">Description...</p>
                    <label for="description" class="form-label"></label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="" value="<?php echo $product['description'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter description.
                    </div>
                    <br>
                    <p class="card-text pt-3">Tags: </p>
                    <label for="tags" class="form-label"></label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="" value="<?php echo $product['tags'] ?>" required>
                    <div class="invalid-feedback">
                      Please enter material.
                    </div>
                    <br>

                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="updateItem">Update</button>
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