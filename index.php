<?php
session_start();
require('function/db.php');
require('function/customer-db.php');
require('function/store-db.php');
require('function/cart-functions.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action === NULL) {
    $action = 'list_products';
  }
}

switch ($action) {

    // show homepage with products
  case ('list_products'):
    $category = filter_input(INPUT_GET, 'category');
    if ($category == NULL || $category == FALSE) {
      $category = 'all';
    }
    //$categories = getCategories();
    $products = getProducts($category);
    include 'page/home.php';
    break;

    // show product details
  case ('product'):
    if (!isset($_GET['itemid'])) {
      include 'page/home.php';
      break;
    }
    if (isset($_GET['msg']) && ($_GET['msg'] == 'success')) {
      $message = 'Added to cart!';
    }
    $product = getProductDetails($_GET['itemid']);
    include 'page/product.php';
    break;

    // show a person's cart 
  case ('cart'):
    include 'page/cart.php';
    break;

    // show checkout page
  case ('checkout'):
    include 'page/checkout.php';
    break;

    // show customer's account
  case ('account'):
    $info = getCustomerData($_SESSION['customerID']);
    include 'page/account.php';
    break;

    // show edit account page
  case ('editaccount'):
    $info = getCustomerData($_SESSION['customerID']);
    include 'page/edit-account.php';
    break;

    // show login page
  case ('login'):
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (!isset($_POST['email'])) {
      $login_message = 'Sign in to view your account.';
      include 'page/login.php';
      break;
    }

    if (isValidLogin($email, $password)) {
      $_SESSION['loggedin'] = true;
      $_SESSION['customerID'] = getCustomerID($email);
      $info = getCustomerData($_SESSION['customerID']);
      include 'page/account.php';
    } else {
      $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
      include('page/login.php');
    }
    break;

    // show register page 
  case ('register'):
    include 'page/register.php';
    break;

    // log someone out 
  case ('logout'):
    logout();
    break;

    // show order details page 
  case ('order-details'):
    include 'page/order-details.php';
    break;

  case ('add-to-cart'):
    $itemID = $_POST['itemid'];
    $quantity = $_POST['quantity'];
    addToCart($itemID, $quantity);

    $products = getProducts('all');
    header("Location: .?action=product&itemid=$itemID&msg=success#view");
    break;

  case ('home-add-to-cart'):
    $itemID = $_POST['itemid'];
    $quantity = $_POST['quantity'];
    addToCart($itemID, $quantity);

    $products = getProducts('all');
    header("Location: .?msg=success#view");
    break;

  case ('clear-cart'):
    clearCart();
    header('Location: .?action=cart#view');
    break;

  case ('remove-item'):
    $itemID = $_POST['itemid'];
    removeFromCart($itemID);
    header('Location: .?action=cart#view');
    break;

  case ('update-personal'):
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');

    updateCustomer($_SESSION['customerID'], $email, $firstName, $lastName);
    header('Location: .?action=account');
}
