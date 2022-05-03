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

    $color = filter_input(INPUT_GET, 'colorsearch');
    if ($color == NULL || $color == FALSE) {
      $color = 'all';
    }

    $material = filter_input(INPUT_GET, 'materialsearch');
    if ($material == NULL || $material == FALSE) {
      $material = 'all';
    }

    $products = getProducts($category, $color, $material);

    if (isset($_GET['search'])) {
      $searchterm = filter_input(INPUT_GET, 'searchterm');
      $products = keywordSearch($searchterm, $category);
    }

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
    if (isset($_GET['msg']) && ($_GET['msg'] == 'error')) {
      $outofstock_msg = 'Could not add item to cart: item is out of stock!';
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
    if (empty($_SESSION['cart']) || !canPurchaseCart()) {
      include 'page/cart.php';
    } else {
      if (isset($_SESSION['loggedin'])) {
        $info = getCustomerData($_SESSION['customerID']);
      }
      include 'page/checkout.php';
    }
    break;

    // show customer's account
  case ('account'):
    require_once('utils/verify-login.php');
    $info = getCustomerData($_SESSION['customerID']);
    $orders = getOrderHistory($_SESSION['customerID']);
    include 'page/account.php';
    break;

    // show edit account page
  case ('editaccount'):
    require_once('utils/verify-login.php');
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
      header('Location: .?action=account');
    } else {
      $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
      include('page/login.php');
    }
    break;

    // show register page 
  case ('register'):
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (!isset($_POST['email'])) {
      $register_message = 'Create an account for a better shopping experience!';
      include 'page/register.php';
      break;
    }

    registerCustomer($email, $password, $firstName, $lastName);

    if (isValidLogin($email, $password)) {
      $_SESSION['loggedin'] = true;
      $_SESSION['customerID'] = getCustomerID($email);
      $info = getCustomerData($_SESSION['customerID']);
      header('Location: .?action=account');
    } else {
      $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
      include('page/login.php');
    }
    break;

    // log someone out 
  case ('logout'):
    logout();
    break;

    // show page to search for order
  case ('order-search'):
    $order_message = 'Search for your order here.';

    if (isset($_POST['orderid']) && isset($_POST['email'])) {
      $order_message = '<span class="text-danger">This order was not found.</span>';

      $orderID = filter_input(INPUT_POST, 'orderid');
      $email = filter_input(INPUT_POST, 'email');

      if (searchOrder($email, $orderID)) {
        $order = getOrderDetails($orderID);
        $items = getOrderItems($orderID);
        include 'page/order-details.php';
        break;
      }
      echo searchOrder($email, $orderID);
    }

    include 'page/order-search.php';
    break;

    // show order details page 
  case ('order-details'):
    $orderID = filter_input(INPUT_GET, 'orderid');
    $order = getOrderDetails($orderID);
    $items = getOrderItems($orderID);
    include 'page/order-details.php';
    break;

    // add item to cart
  case ('add-to-cart'):
    $itemID = filter_input(INPUT_POST, 'itemid');
    $quantity = filter_input(INPUT_POST, 'quantity');

    if (!canAddToCart($itemID, $quantity)) {
      $products = getProducts('all', 'all', 'all');
      header("Location: .?action=product&itemid=$itemID&msg=error#view");
      break;
    }

    addToCart($itemID, $quantity);
    $products = getProducts('all', 'all', 'all');
    header("Location: .?action=product&itemid=$itemID&msg=success#view");
    break;

  case ('home-add-to-cart'):
    $itemID = filter_input(INPUT_POST, 'itemid');
    $quantity = filter_input(INPUT_POST, 'quantity');

    if (!canAddToCart($itemID, $quantity)) {
      $products = getProducts('all', 'all', 'all');
      header("Location: .?action=product&itemid=$itemID&msg=error#view");
      break;
    }

    addToCart($itemID, $quantity);
    $products = getProducts('all', 'all', 'al;');
    header("Location: .?msg=success#view");
    break;

  case ('change-cart-quantity'):
    $itemID = filter_input(INPUT_POST, 'itemid');
    if (isset($_POST['remove1'])) {
      removeOneFromCart($itemID);
      header("Location: .?action=cart#view");
    }
    if (isset($_POST['add1'])) {

      if (!canAddToCart($itemID, 1)) {
        header("Location: .?action=cart#view");
        break;
      }

      addToCart($itemID, 1);
      header("Location: .?action=cart#view");
    }

    break;

  case ('clear-cart'):
    clearCart();
    header('Location: .?action=cart#view');
    break;

  case ('remove-item'):
    $itemID = filter_input(INPUT_POST, 'itemid');
    removeFromCart($itemID);
    header('Location: .?action=cart#view');
    break;

  case ('update-personal'):
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');

    updateCustomer($_SESSION['customerID'], $email, $firstName, $lastName);
    header('Location: .?action=account');
    break;

  case ('update-password'):
    $current = filter_input(INPUT_POST, 'currentPassword');
    $email = filter_input(INPUT_POST, 'email');

    if (isValidLogin($email, $current)) {
      $newPassword = filter_input(INPUT_POST, 'newPassword');
      updatePassword($_SESSION['customerID'], $newPassword);
      $message = 'Password updated';
      header('Location: .?action=editaccount&msg=success#password');
    } else {
      header('Location: .?action=editaccount&msg=error#password');
    }
    break;

  case ('update-shipping'):
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $street = filter_input(INPUT_POST, 'street');
    $street2 = filter_input(INPUT_POST, 'street2');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');

    updateDefaultAddr($_SESSION['customerID'], $firstName, $lastName, $street, $street2, $city, $state, $zip);
    header('Location: .?action=account');
    break;

  case ('place-order'):
    $cart = $_SESSION['cart'];
    if (!canPurchaseCart()) {
      header('Location: .?action=cart');
      break;
    }

    if (empty($cart) || sizeof($cart) == 0 || !isset($cart)) {
      header('Location: .');
      break;
    }

    if (isset($_SESSION['customerID'])) {
      $customerID = $_SESSION['customerID'];
    } else {
      $customerID = null;
    }

    $email = filter_input(INPUT_POST, 'email');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');

    if (!isset($_POST['street2']) || trim($_POST['street2']) == '') {
      $street2 = null;
    } else {
      $street2 = filter_input(INPUT_POST, 'street2');
    }

    $orderID = placeOrder($customerID, $email, $firstName, $lastName, $street, $street2, $city, $state, $zip);

    if (isset($_POST['save-info'])) {
      $update_message = 'Successfully updated your info!';
      updateDefaultAddr($customerID, $firstName, $lastName, $street, $street2, $city, $state, $zip);
    }

    // Variables for confirmation page
    if (!isset($_POST['same-address'])) {
      $billFirstName = filter_input(INPUT_POST, 'billFirstName');
      $billLastName = filter_input(INPUT_POST, 'billLastName');
      $billStreet = filter_input(INPUT_POST, 'billStreet');
      $billCity = filter_input(INPUT_POST, 'billCity');
      $billState = filter_input(INPUT_POST, 'billState');
      $billZip = filter_input(INPUT_POST, 'billZip');
      if (!isset($_POST['billStreet2']) || trim($_POST['billStreet2']) == '') {
        $billStreet2 = null;
      } else {
        $billStreet2 = filter_input(INPUT_POST, 'billStreet2');
      }
    } else {
      $billFirstName = filter_input(INPUT_POST, 'firstName');
      $billLastName = filter_input(INPUT_POST, 'lastName');
      $billStreet = filter_input(INPUT_POST, 'street');
      $billCity = filter_input(INPUT_POST, 'city');
      $billState = filter_input(INPUT_POST, 'state');
      $billZip = filter_input(INPUT_POST, 'zip');
      if (!isset($_POST['street2']) || trim($_POST['street2']) == '') {
        $billStreet2 = null;
      } else {
        $billStreet2 = filter_input(INPUT_POST, 'street2');
      }
    }

    $paymentMethod = filter_input(INPUT_POST, 'paymentMethod');
    $cardNum = '*' . substr(filter_input(INPUT_POST, 'cardNum'), -4);

    $order = getOrderDetails($orderID);
    $items = getOrderItems($orderID);
    include 'page/confirmation.php';
    break;

  case ('modal'):

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (!isset($_POST['email'])) {
      $login_message = 'Sign in to save your information for next time!';
      include 'page/modal.php';
      break;
    }

    if (isValidLogin($email, $password)) {
      $_SESSION['loggedin'] = true;
      $_SESSION['customerID'] = getCustomerID($email);
      $info = getCustomerData($_SESSION['customerID']);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
      $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
      include('page/modal.php');
    }

    break;

    // ADMIN STUFF
  case ('admin'):
    logout();
    header('Location: admin/index.php');
    break;
}