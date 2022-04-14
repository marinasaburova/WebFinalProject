<!-- Shows current store inventory -->

<?php
include '../admin-view/header.php';
include '../admin-view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
    <main>
        <div class="py-5 text-center">
            <h2>Inventory</h2>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <?php include '../admin-view/inv-sidebar.php'; ?>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Row 1 of Items -->
                <div class="row align-items-start justify-content-center text-center">
                    <div class="col-sm">
                        <div class="card mb-4">
                            <a href="product.php#view"><img class="card-img-top" src="../media/purse.jpg" alt="Image of product" /></a>
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <a href="product.php#view"><img class="card-img-top" src="../media/purse.jpg" alt="Image of product" /></a>
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Row 2 of Items -->
                <div class="row align-items-start justify-content-center text-center">
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Row 3 of Items -->
                <div class="row align-items-start justify-content-center text-center">
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../media/purse.jpg" alt="Image of product" />
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col main content -->
        </div>
        <!-- /.row -->
    </main>
    <!-- /.main -->
</div>
<!-- /.middle container -->

<?php
include '../admin-view/footer.php';
?>