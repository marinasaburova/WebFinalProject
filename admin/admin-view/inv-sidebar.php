<!-- Sidebar -->

<?php
$class_product = 'nav-link';

if (isset($action)) {
    $class_product = 'nav-link active';
}
?>

<div class="col-md-3">
    <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
        <div class="card-body">
            <h5 class="card-title">Filter</h5>

            <h6 class="cart-text">Category</h6>
            <p class="card-text">Filter options go here</p>

            <h6 class="cart-text">Sort By</h6>
            <p class="card-text">Filter options go here</p>

            <h6 class="cart-text">Text Search</h6>
            <p class="card-text">Filter options go here</p>

            <a href="#" class="btn btn-primary">Search</a>
        </div>

        <div class="card-footer">
            <nav class="sticky-top" id="view">
                <a href=".?action=new-product.php" class="<?php echo $class_product ?>">New Product</a>
            </nav>
        </div>
    </div>
</div>
<!-- /.sidebar -->