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
                    <form action="." method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="editaccount">
                        <input type="hidden" name="employeeID" value="<?php echo $info['employeeID'] ?>"> 
                        <h4 class="d-flex justify-content-between align-items-center mb-3 pt-1">
                            <span class="text-primary">Your Info</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">First name</h6>
                                </div>
                                <div class="text-muted">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="<?php echo $info['firstName'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter first name.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Last name</h6>
                                </div>
                                <div class="text-muted">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="<?php echo $info['lastName'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter last name.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Email</h6>
                                </div>
                                <div class="text-muted">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $info['email'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter name.
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <button class="w-100 btn btn-secondary" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-4"></div>
    </main>

    <?php
    include 'admin-view/footer.php';
    ?>