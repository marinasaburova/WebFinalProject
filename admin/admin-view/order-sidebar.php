<!-- Sidebar -->
<?php
$statuses = getOrderStatus();
?>

<div class="col-md-3">
    <div class="card bg-light sticky-top mb-4 border-light" style="top: 72px">
        <div class="card-body">
            <h4 class="card-title">Filter</h4>
            <hr class="my-3">

            <form action="." method="get">
                <label for="statussearch" class="form-label">Show:</label>
                <select class="form-control mb-3" name="statussearch">
                    <option value="all">All</option>
                    <?php
                    foreach ($statuses as $status) { ?>
                        <option value="<?php echo $status['status'] ?>"><?php echo $status['status'] ?></option>
                    <?php } ?>
                </select>

                <label for="sort" class="form-label">Sort by:</label>
                <select class="form-control mb-3" name="sort">
                    <option value="all">All</option>
                    <option value="orderID">Order ID</option>
                    <option value="price">Price</option>
                </select>

                <input type="hidden" name="action" value="orders">

                <button class="btn btn-primary mb-3" type="submit">Search</button>
            </form>

            <hr class="my-3">

            <form action="." method="get">
                <label for="searchterm" class="form-label">Search by Keyword:</label>
                <input name="searchterm" type="text" class="form-control mb-3">
                <input type="hidden" name="category" value=<?php echo $category ?>>
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