<?php
session_start();
require_once('function/db.php');
// require_once('utils/secure-conn.php');
require('function/customer-db.php');
require('function/store-db.php');
require('function/cart-functions.php');

// Logs out employees 
if (isset($_SESSION['emploggedin'])) {
  unset($_SESSION['emploggedin']);
}

// Gets action
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
    // gets category
    $category = trim(filter_input(INPUT_GET, 'category'));

    // checks if valid category
    $categories = getCategories();
    $cArray = array();
    foreach ($categories as $c) {
      array_push($cArray, $c['category']);
    }
    if (!in_array($category, $cArray)) {
      $category = 'all';
    }

    // gets color
    $color = trim(filter_input(INPUT_GET, 'colorsearch', FILTER_SANITIZE_ADD_SLASHES));
    if ($color == NULL || $color == FALSE) {
      $color = 'all';
    }

    // gets material
    $material = trim(filter_input(INPUT_GET, 'materialsearch', FILTER_SANITIZE_ADD_SLASHES));
    if ($material == NULL || $material == FALSE) {
      $material = 'all';
    }

    // gets array of products with specific categories
    $products = getProducts($category, $color, $material);

    // searches for products by keyword
    if (isset($_GET['search'])) {
      $searchterm = strtolower(trim(filter_input(INPUT_GET, 'searchterm', FILTER_SANITIZE_ADD_SLASHES)));
      $products = keywordSearch($searchterm, $category);
    }

    $itemID = trim(filter_input(INPUT_GET, 'itemid', FILTER_SANITIZE_NUMBER_INT));

    include 'page/home.php';
    break;

    // show product details
  case ('product'):
    if (!isset($_GET['itemid']) || $_GET['itemid'] == null) {
      header('Location: .?action=list_products');
      break;
    }

    $itemID = trim(filter_input(INPUT_GET, 'itemid', FILTER_SANITIZE_NUMBER_INT));
    $product = getProductDetails($itemID);

    // checks for valid products
    if ($product == NULL || $product == FALSE) {
      $error = 'Sorry, this product was not found';
      include 'view/error.php';
      break;
    }

    if (isset($_GET['msg']) && ($_GET['msg'] == 'success')) {
      $message = 'Added to cart!';
    }
    if (isset($_GET['msg']) && ($_GET['msg'] == 'error')) {
      $outofstock_msg = 'Could not add item to cart: You already have all in-stock items in your cart!';
    }

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
      break;
    }

    if (isset($_SESSION['loggedin'])) {
      $info = getCustomerData($_SESSION['customerID']);
    }
    include 'page/checkout.php';
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
    $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $password = filter_input(INPUT_POST, 'password');

    if ($email == NULL || $email == FALSE || $password == NULL || $password == FALSE) {
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
    $firstName = strip_tags(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_ADD_SLASHES)));
    $lastName = strip_tags(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_ADD_SLASHES)));
    $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $password = filter_input(INPUT_POST, 'password');

    // default page if nothing is submitted
    if ($email == NULL || $email == FALSE || $password == NULL || $password == FALSE) {
      $register_message = 'Create an account for a better shopping experience!';
      include 'page/register.php';
      break;
    }

    // registers customer
    if (registerCustomer($email, $password, $firstName, $lastName)) {

      // logs in registered customer
      if (isValidLogin($email, $password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['customerID'] = getCustomerID($email);
        $info = getCustomerData($_SESSION['customerID']);
        header('Location: .?action=account');
      } else {
        $login_message = '<span class="text-danger">Your email and/or password was not recognized.</span>';
        include('page/login.php');
      }
    } else {
      $register_message = '<span class="text-danger">There is an account with this email already!</span>';
      include 'page/register.php';
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

      $orderID = trim(filter_input(INPUT_POST, 'orderid', FILTER_SANITIZE_NUMBER_INT));
      $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));

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
    $orderID = trim(filter_input(INPUT_GET, 'orderid', FILTER_SANITIZE_NUMBER_INT));
    $order = getOrderDetails($orderID);
    $items = getOrderItems($orderID);

    if ($order == NULL || $order == FALSE || $items == NULL || $items == FALSE) {
      $error = 'Sorry, this order was not found.';
      include 'view/error.php';
      break;
    }

    include 'page/order-details.php';
    break;

    // add item to cart
  case ('add-to-cart'):
    $itemID = trim(filter_input(INPUT_POST, 'itemid', FILTER_SANITIZE_NUMBER_INT));
    $quantity = trim(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT));

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
    $itemID = trim(filter_input(INPUT_POST, 'itemid', FILTER_SANITIZE_NUMBER_INT));
    $quantity = trim(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT));

    $link = "./?action=list_products";

    if (!canAddToCart($itemID, $quantity)) {
      $products = getProducts($category, $color, $material);
      header("Location: " . $link . "&itemid=" . $itemID . "&msg=error#" . $itemID);
      break;
    }

    addToCart($itemID, $quantity);
    header("Location: " . $link . "&itemid=" . $itemID . "&msg=success#" . $itemID);
    break;

    // change quantity of items in cart
  case ('change-cart-quantity'):
    $itemID = trim(filter_input(INPUT_POST, 'itemid', FILTER_SANITIZE_NUMBER_INT));

    // remove an item
    if (isset($_POST['remove1'])) {
      removeOneFromCart($itemID);
      header("Location: .?action=cart#view");
      break;
    }

    // add an item
    if (isset($_POST['add1'])) {

      if (!canAddToCart($itemID, 1)) {
        header("Location: .?action=cart#view");
        break;
      }

      addToCart($itemID, 1);
      header("Location: .?action=cart#view");
      break;
    }
    header('Location: .');
    break;

    // empties cart
  case ('clear-cart'):
    clearCart();
    header('Location: .?action=cart#view');
    break;

    // removes item from cart
  case ('remove-item'):
    $itemID = trim(filter_input(INPUT_POST, 'itemid', FILTER_SANITIZE_NUMBER_INT));
    if ($itemID != NULL && $itemID != FALSE) {
      removeFromCart($itemID);
    }
    header('Location: .?action=cart#view');
    break;

  case ('update-personal'):
    if (isset($_POST['firstName'])) {
      $firstName = strip_tags(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_ADD_SLASHES)));
      $lastName = strip_tags(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_ADD_SLASHES)));
      $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));

      if (updateCustomer($_SESSION['customerID'], $email, $firstName, $lastName)) {
        header('Location: .?action=editaccount&msg=acctsuccess#personal');
      } else {
        header('Location: .?action=editaccount&msg=accterror#personal');
      }
    }
    break;

  case ('update-password'):
    $current = filter_input(INPUT_POST, 'currentPassword');
    $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));

    if (isValidLogin($email, $current)) {
      $newPassword = filter_input(INPUT_POST, 'newPassword');
      updatePassword($_SESSION['customerID'], $newPassword);
      $message = 'Password updated';
      header('Location: .?action=editaccount&msg=pwdsuccess#password');
    } else {
      header('Location: .?action=editaccount&msg=pwderror#password');
    }
    break;


    // Updates customer shipping information
  case ('update-shipping'):
    $firstName = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_ADD_SLASHES));
    $lastName = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_ADD_SLASHES));
    $street = trim(filter_input(INPUT_POST, 'street', FILTER_SANITIZE_ADD_SLASHES));
    $street2 = trim(filter_input(INPUT_POST, 'street2', FILTER_SANITIZE_ADD_SLASHES));
    $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_ADD_SLASHES));
    $state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_ADD_SLASHES));
    $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));

    updateDefaultAddr($_SESSION['customerID'], $firstName, $lastName, $street, $street2, $city, $state, $zip);
    header('Location: .?action=account');
    break;

    // Places an order 
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

    $email = strip_tags(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $firstName = strip_tags(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS)));
    $lastName = strip_tags(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS)));
    $street = strip_tags(trim(filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS)));
    $city = strip_tags(trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS)));
    $state = strip_tags(trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS)));
    $zip = strip_tags(trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT)));

    if (!isset($_POST['street2']) || trim($_POST['street2']) == '') {
      $street2 = null;
    } else {
      $street2 = strip_tags(trim(filter_input(INPUT_POST, 'street2', FILTER_SANITIZE_SPECIAL_CHARS)));
    }

    $orderID = placeOrder($customerID, $email, $firstName, $lastName, $street, $street2, $city, $state, $zip);

    if (isset($_POST['save-info'])) {
      $update_message = 'Successfully updated your info!';
      updateDefaultAddr($customerID, $firstName, $lastName, $street, $street2, $city, $state, $zip);
    }

    // Variables for confirmation page
    if (!isset($_POST['same-address'])) {
      $billFirstName = strip_tags(trim(filter_input(INPUT_POST, 'billFirstName', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billLastName = strip_tags(trim(filter_input(INPUT_POST, 'billLastName', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billStreet = strip_tags(trim(filter_input(INPUT_POST, 'billStreet', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billCity = strip_tags(trim(filter_input(INPUT_POST, 'billCity', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billState = strip_tags(trim(filter_input(INPUT_POST, 'billState', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billZip = strip_tags(trim(filter_input(INPUT_POST, 'billZip', FILTER_SANITIZE_NUMBER_INT)));
      if (!isset($_POST['billStreet2']) || trim($_POST['billStreet2']) == '') {
        $billStreet2 = null;
      } else {
        $billStreet2 = strip_tags(trim(filter_input(INPUT_POST, 'billStreet2', FILTER_SANITIZE_SPECIAL_CHARS)));
      }
    } else {
      $billFirstName = strip_tags(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billLastName = strip_tags(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billStreet = strip_tags(trim(filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billCity = strip_tags(trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billState = strip_tags(trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS)));
      $billZip = strip_tags(trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT)));
      if (!isset($_POST['street2']) || trim($_POST['street2']) == '') {
        $billStreet2 = null;
      } else {
        $billStreet2 = strip_tags(trim(filter_input(INPUT_POST, 'street2', FILTER_SANITIZE_SPECIAL_CHARS)));
      }
    }

    $paymentMethod = filter_input(INPUT_POST, 'paymentMethod', FILTER_SANITIZE_SPECIAL_CHARS);
    $cardNum = trim('*' . substr(filter_input(INPUT_POST, 'cardNum', FILTER_SANITIZE_NUMBER_INT), -4));

    $order = getOrderDetails($orderID);
    $items = getOrderItems($orderID);
    include 'page/confirmation.php';
    break;

    // Goes to admin side
  case ('admin'):
    header('Location: admin/index.php');
    break;

    // Shows homepage
  default:
    header('Location: .?action=list_products');
    break;
}
