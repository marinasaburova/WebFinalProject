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
        /*
        require_once('../utils/verify-admin.php');
        include 'page/register.php';*/
        registerEmployee('marina@employee.com', '1234', 'Marina', 'TheEmployee');
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
        $products = getProducts($category);
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
}
