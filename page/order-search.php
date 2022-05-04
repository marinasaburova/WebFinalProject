<!-- Login page for customers -->

<?php
include('view/header.php');
?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-4"></div>
        <!-- main column-->
        <div class="col-sm-4">
            <main class="form-signin">
                <form action="." method="post">
                    <h1 class="h3 mb-3 fw-normal">Check Order Details</h1>
                    <p><?php echo $order_message; ?></p>
                    <input type="hidden" name="action" value="order-search">
                    <div class="form-floating my-2">
                        <input type="email" name="email" class="form-control" id="floatingInput" maxlength="60" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" name="orderid" class="form-control" id="floatingInput" minlength="10" maxlength="10" pattern="[0-9]{10}" placeholder="xxxxxxxxxx" required>
                        <label for="floatingInput">Order Number</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">View Order</button>
                    <a href=".?action=login">
                        <p class="mt-4 mb-5 text-muted">Login</p>
                    </a>
                </form>
            </main>
        </div>
        <!-- ./col -->
        <div class="col-sm-4"></div>
    </div>
    <!-- ./row -->
</div>
<?php include('view/footer.php') ?>
</body>

</html>