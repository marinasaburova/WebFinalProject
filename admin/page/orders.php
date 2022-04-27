<!-- Shows current store inventory -->

<?php
include 'admin-view/header.php';
include 'admin-view/navigation.php';
?>
<!-- Middle Container -->
<div class="container-fluid">
    <main>
        <div class="py-5 text-center">
            <h2>Orders</h2>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <?php include 'admin-view/order-sidebar.php'; ?>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Row 1 of Items -->
                <div class="row align-items-start justify-content-center text-center">
                    <div class="col-sm">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Order Number</h5>
                                <p class="card-text">Status</p>
                                <p class="card-text">Total Price</p>
                                <a href=".?action=order-details&orderid=0000000026" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Order Number</h5>
                                <p class="card-text">Status</p>
                                <p class="card-text">Total Price</p>
                                <a href="#" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Order Number</h5>
                                <p class="card-text">Status</p>
                                <p class="card-text">Total Price</p>
                                <a href="#" class="btn btn-primary">Manage</a>
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
include 'admin-view/footer.php';
?>