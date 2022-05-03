<!-- Register for an account-->

<?php
include('admin-view/header.php');
include('admin-view/navigation.php')
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>New Product</h2>
    </div>

    <div class="mb-3">
      <!-- General Info -->
      <div>
        <form action="." method="post">
          <div class="mb-3">
            <!-- name -->
            <div class="mb-3">
              <label for="itemName" class="form-label">Item Name</label>
              <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Type in item name..." required>
            </div>

            <!-- price -->
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="float" class="form-control" id="price" name="price" placeholder="Type in price.." required>
            </div>

            <!-- quantity -->
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Type in quantity.." required>
            </div>

            <!-- category -->
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="category" class="form-control" id="category" name="category" placeholder="Create a category" required>
            </div>

            <!-- color -->
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" id="color" name="color" placeholder="Type in color..." required>
            </div>

            <!-- material -->
            <div class="mb-3">
              <label for="material" class="form-label">Material</label>
              <input type="text" class="form-control" id="material" name="material" placeholder="Type in material..." required>
            </div>

            <!-- description -->
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Type in description..." required>
            </div>

            <!-- tags -->
            <div class="mb-3">
              <label for="tags" class="form-label">tags</label>
              <input type="text" class="form-control" id="tags" name="tags" placeholder="Type in tags..." required>
            </div>

            <a href="register.php">Register</a>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" name="addItem">Add Item</button>
            <input type="hidden" name="action" value="new-product">

          </div>
        </form>
      </div>
      <!-- ./General Information -->
    </div>
  </main>
</div>

<?php include('admin-view/footer.php') ?>