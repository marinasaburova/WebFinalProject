<!-- Shows employee's personal account info -->

<?php
require_once('../utils/verify-admin.php');
include('admin-view/header.php');
include('admin-view/navigation.php');
?>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Welcome, Name</h2>
            <p class="lead">Manage your account here.</p>
        </div>

        <div class="row g-5">
            <!-- Personal Info -->
            <div class="col-md-3 col-lg-4"></div>
            <div class="col-md-6 col-lg-4">
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
                    </ul>

                    <form class="card p-2" action=".#view">
                        <input type="hidden" name="action" value="editaccount">
                        <div class="input-group">
                            <button class="w-100 btn btn-secondary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-4"></div>
    </main>

    <?php
    include 'admin-view/footer.php';
    ?>