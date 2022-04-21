<?php
session_start();
require('function/db.php');
require('function/customer-db.php');

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
    //  $categories = getCategories();
    //  $products = getProducts($category);
    include 'page/home.php';
    break;

    // show product details
  case ('product'):
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
    include 'page/account.php';
    break;

    // show edit account page
  case ('editaccount'):
    include 'page/edit-account.php';
    break;

    // show login page
  case ('login'):
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (isValidLogin($email, $password)) {
      $_SESSION['loggedin'] = true;
      include('page/account.php');
    } else {
      $login_message = 'Sign in to view your account.';
      include('page/login.php');
    }
    break;

    // show register page 
  case ('register'):
    include 'page/register.html';
    break;

    // log someone out 
  case ('logout'):
    logout();
    break;
}
