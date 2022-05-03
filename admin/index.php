<?php
session_start();
require('../function/db.php');
require('../function/customer-db.php');
require('../function/store-db.php');
require('../function/employee-db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'inventory';
    }
}

switch ($action) {

        // show login page
    case ('login'):
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if (!isset($_POST['email'])) {
            $login_message = 'Sign in to view your account.';
            include 'page/login.php';
            break;
        }

        if (isValidEmployee($email, $password)) {
            $_SESSION['emploggedin'] = true;
            $_SESSION['employeeID'] = getEmployeeID($email);
            $info = getEmployeeData($_SESSION['employeeID']);
            header('Location: .');
        } else {
            $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
            include('page/login.php');
        }
        break;

        // show register page 
    case ('register'):
        require_once('../utils/verify-admin.php');
        include 'page/register.php';
        break;

        // log someone out 
    case ('logout'):
        logout();
        break;

        // show homepage
    case ('home'):
        require_once('../utils/verify-admin.php');
        include 'page/admin-home.php';
        break;

        // show homepage with products
    case ('inventory'):
        require_once('../utils/verify-admin.php');
        $category = filter_input(INPUT_GET, 'category');
        if ($category == NULL || $category == FALSE) {
            $category = 'all';
        }
        //$categories = getCategories();
        $products = getProducts($category, 'all', 'all');
        include 'page/inventory.php';
        break;

        // show product details
    case ('product'):
        require_once('../utils/verify-admin.php');
        if (!isset($_GET['itemid'])) {
            include 'page/home.php';
            break;
        }
        $product = getProductDetails($_GET['itemid']);
        include 'page/product.php';
        break;

        // show all orders
    case ('orders'):
        require_once('../utils/verify-admin.php');
        $orders = getAllOrders();
        include 'page/orders.php';
        break;

        // show order details page 
    case ('order-details'):
        require_once('../utils/verify-admin.php');
        $orderID = filter_input(INPUT_GET, 'orderid');
        $order = getOrderDetails($orderID);
        $items = getOrderItems($orderID);
        include 'page/order-details.php';
        break;

        // show employee account
    case ('emp-account'):
        require_once('../utils/verify-admin.php');
        $info = getEmployeeData($_SESSION['employeeID']);
        include 'page/account.php';
        break;

        // show edit account page
    case ('editaccount'):
        require_once('../utils/verify-admin.php');
        $info = getEmployeeData($_SESSION['employeeID']);
        include 'page/edit-account.php';
        break;

        // update personal information
    case ('update-personal'):
        require_once('../utils/verify-admin.php');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email');

        updateEmployee($_SESSION['employeeID'], $email, $firstName, $lastName);
        header('Location: .?action=account');
        break;

        //create new product
    case ('new-product'):
        require_once('../utils/verify-admin.php');

        if (isset($_POST['addItem'])) {
            $message = 'Item Added';
            header('Location: .?action=inventory&msg=success');
            $name = filter_input(INPUT_POST, 'name');
            $price = filter_input(INPUT_POST, 'price');
            $quantity = filter_input(INPUT_POST, 'quantity');
            $category = filter_input(INPUT_POST, 'category');
            $color = filter_input(INPUT_POST, 'color');
            $material = filter_input(INPUT_POST, 'material');
            $description = filter_input(INPUT_POST, 'description');
            $tags = filter_input(INPUT_POST, 'tags');
            addItem($name, $price, $quantity, $category, $color, $material, $description, $tags);
            break;
        } else {
            echo 'not adding product';
            include 'page/new-product.php';
            break;
        }

        //update product
        case ('update-product'):
            require_once('../utils/verify-admin.php');
    
            if (isset($_POST['updateItem'])) {
                $message = 'Updated';
                header('Location: .?action=inventory&msg=success');
                $name = filter_input(INPUT_POST, 'name');
                $price = filter_input(INPUT_POST, 'price');
                $quantity = filter_input(INPUT_POST, 'quantity');
                $category = filter_input(INPUT_POST, 'category');
                $color = filter_input(INPUT_POST, 'color');
                $material = filter_input(INPUT_POST, 'material');
                $description = filter_input(INPUT_POST, 'description');
                $tags = filter_input(INPUT_POST, 'tags');
                addItem($name, $price, $quantity, $category, $color, $material, $description, $tags);
                break;
            } else {
                echo 'not adding product';
                include 'page/new-product.php';
                break;
            }

        //update order
        case ('update-order'):
            require_once('../utils/verify-admin.php');
    
            if (isset($_POST['updateOrder'])) {
                $message = 'Updated';
                header('Location: .?action=inventory&msg=success');
                $name = filter_input(INPUT_POST, 'name');
                $price = filter_input(INPUT_POST, 'price');
                $quantity = filter_input(INPUT_POST, 'quantity');
                $category = filter_input(INPUT_POST, 'category');
                $color = filter_input(INPUT_POST, 'color');
                $material = filter_input(INPUT_POST, 'material');
                $description = filter_input(INPUT_POST, 'description');
                $tags = filter_input(INPUT_POST, 'tags');
                addItem($name, $price, $quantity, $category, $color, $material, $description, $tags);
                break;
            } else {
                echo 'Did not update';
                include 'page/new-product.php';
                break;
            }

        // update password
    case ('update-password'):
        require_once('../utils/verify-admin.php');
        $current = filter_input(INPUT_POST, 'currentPassword');
        $email = filter_input(INPUT_POST, 'email');

        if (isValidEmployee($email, $current)) {
            $newPassword = filter_input(INPUT_POST, 'newPassword');
            updatePassword($_SESSION['employeeID'], $newPassword);
            $message = 'Password updated';
            header('Location: .?action=editaccount&msg=success#password');
        } else {
            header('Location: .?action=editaccount&msg=error#password');
        }
        break;

        // Back to customer page
    case ('customer'):
        logout();
        header('Location: ../');
        break;

        // TEST: can modify or remove 
    case ('img-upload-page'):
        include 'page/image-upload-test.php';
        break;

    case ('test-img-upload'):
        $imagename = filter_input(INPUT_POST, 'itemid');
        $image = filter_input(INPUT_POST, 'pic');

        //Stores the filetype e.g image/jpeg
        $imagetype = $_FILES['pic']['type'];
        // Get image extension
        $extension = explode('/', $imagetype)[1];
        //Stores any error codes from the upload.
        $imageerror = $_FILES['pic']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $imagetemp = $_FILES['pic']['tmp_name'];

        //The path you wish to upload the image to
        $imagePath = "../media/";

        if (is_uploaded_file($imagetemp)) {
            if (move_uploaded_file($imagetemp, $imagePath . $imagename . '.' . $extension)) {
                echo "Sussecfully uploaded your image.";
            } else {
                echo "Failed to move your image.";
            }
        } else {
            echo "Failed to upload your image.";
        }
        break;
    
    // show order details page 
    case ('order-details'):
        $orderID = filter_input(INPUT_GET, 'orderID');
        $order = getOrderDetails($orderID);
        $items = getOrderItems($orderID);
        include 'page/order-details.php';
        break;
}
