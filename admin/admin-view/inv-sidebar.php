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

                <label for="category" class="form-label">Category:</label>
                <select class="form-control mb-3" name="category">
                    <option value="all">All</option>
                    <option value="bags">Bags</option>
                    <option value="sunglasses">Sunglasses</option>
                    <option value="belts">Belts</option>
                    <option value="watches">Watches</option>
                </select>

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

                <input type="hidden" name="action" value="inventory">

                <button class="btn btn-primary mb-3" type="submit">Search</button>
            </form>

            <hr class="my-3">

            <form action="." method="get">
                <label for="searchterm" class="form-label">Search by Keyword:</label>
                <input name="searchterm" type="text" class="form-control mb-3">
                <input type="hidden" name="colorsearch" value="<?php echo $color ?>">
                <input type="hidden" name="materialsearch" value="<?php echo $material ?>">

                <input type="hidden" name="action" value="inventory">
                <button class="btn btn-primary mb-3" type="submit" name="search">Search</button>
            </form>
        </div>

        <div class="card-footer">
            <!-- Navigation -->
            <nav class="sticky-top" id="view">
                <ul class="nav">
                    <li class="nav-item"><a href=".?action=new-product" class="nav-link active">New Item</a></li>
                </ul>
            </nav>
            <!-- /.navigation -->
        </div>
    </div>
</div>
<!-- /.sidebar -->