<!-- Displays user's account info -->
<!-- User needs to be logged in to see -->

<?php
require_once('utils/verify-login.php');
include('view/header.php');
include('view/navigation.php');
?>


<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Welcome, Name</h2>
            <p class="lead">Manage your account here.</p>
        </div>

        <div class="row g-5">
            <!-- Personal Info -->
            <div class="col-md-5 col-lg-4 order-md-last">
                <div class="sticky-top" style="top:72px; z-index: 1018">

                    <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
                        <span class="text-primary">Your Info</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Name</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">Firstname Lastname</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Email</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">email address</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Phone Number</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">Phone</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Default Address</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">Address</span>
                        </li>
                    </ul>

                    <form class="card p-2" action=".#view">
                        <input type="hidden" name="action" value="editaccount">
                        <div class="input-group">
                            <button class="w-100 btn btn-secondary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./summary -->

            <!-- Cart -->
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3 text-primary pt-1">Your Order History</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Order Number</td>
                            <td>Date</td>
                            <td>Items Ordered</td>
                            <td>Order Total</td>
                        </tr>
                        <tr>
                            <th scope="row">Order Number</td>
                            <td>Date</td>
                            <td>Items Ordered</td>
                            <td>Order Total</td>
                        </tr>
                        <tr>
                            <th scope="row">Order Number</td>
                            <td>Date</td>
                            <td>Items Ordered</td>
                            <td>Order Total</td>
                        </tr>
                        <tr>
                            <th scope="row">Order Number</td>
                            <td>Date</td>
                            <td>Items Ordered</td>
                            <td>Order Total</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <!-- ./cart -->
        </div>
    </main>

    <?php
    include 'view/footer.php';
    ?>