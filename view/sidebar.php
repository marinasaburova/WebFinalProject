<!-- Sidebar -->
<?php
$colors = getColors();
$materials = getMaterials();
?>

<div class="col-md-3">
  <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
    <div class="card-body">
      <h4 class="card-title">Filter</h4>
      <hr class="my-3">

      <form action="." method="get">
        <label for="colorsearch" class="form-label">Color:</label>
        <select class="form-control mb-3" name="colorsearch">
          <option value="all">All</option>
          <?php
          foreach ($colors as $color) { ?>
            <option value="<?php echo $color['color'] ?>"><?php echo $color['color'] ?></option>
          <?php } ?>
        </select>

        <label for="materialsearch" class="form-label">Material:</label>
        <select class="form-control mb-3" name="materialsearch">
          <option value="all">All</option>
          <?php
          foreach ($materials as $material) { ?>
            <option value="<?php echo $material['material'] ?>"><?php echo $material['material'] ?></option>
          <?php } ?>
        </select>

        <input type="hidden" name="category" value=<?php echo $category ?>>

        <button class="btn btn-primary mb-3" type="submit">Search</button>
      </form>

      <hr class="my-3">

      <form action="." method="get">
        <label for="searchterm" class="form-label">Search by Keyword:</label>
        <input name="searchterm" type="text" maxlength="30" class="form-control mb-3" required>
        <input type="hidden" name="category" value=<?php echo $category ?>>
        <button class="btn btn-primary mb-3" type="submit" name="search">Search</button>
      </form>

    </div>
  </div>
</div>
<!-- /.sidebar -->