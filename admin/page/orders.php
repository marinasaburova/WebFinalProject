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
            <div class="col-md-7 col-lg-8">
                <table class="table">
                    <tbody>
                        <?php
                        if (empty($orders) || sizeof($orders) == 0) {
                            echo '<p class="">No orders.</p>';
                            echo '<a href="."><p class="my-0">No orders.</p></a>';
                        }

                        foreach ($orders as $order) {
                            $totalPrice = $order['itemsPrice'] + $order['shipping'] + $order['tax'];
                        ?>
                            <tr>
                                <th scope="row"> <a href=".?action=order-details&orderid=<?php echo $order['orderID'] ?>#view" class="text-reset text-decoration-none">
                                        Order #<?php echo $order['orderID'] ?></a>
                                    </td>
                                <td><?php echo $order['timePlaced'] ?></td>
                                <td><?php echo $order['shipFirstName'] . ' ' . $order['shipLastName'] ?></td>
                                <td><?php echo getOrderQuantity($order['orderID']) ?> items </td>
                                <td>$<?php echo $totalPrice ?></td>
                                <td><?php echo $order['status'] ?></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
            <!-- ./cart -->
    </main>
    <!-- /.main -->
</div>
<!-- /.middle container -->

<?php
include 'admin-view/footer.php';
?>