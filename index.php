<?php
session_start();
require('function/db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action === NULL) {
    $action = 'list_products';
  }
}

switch ($action) {
  case ('list_products'):
    $category = filter_input(INPUT_GET, 'category');
    if ($category == NULL || $category == FALSE) {
      $category = 'all';
    }
    //  $categories = getCategories();
    //  $products = getProducts($category);
    include 'page/home.php';
    break;

  case ('product'):
    include 'page/product.php';
    break;

  case ('cart'):
    include 'page/cart.php';
    break;
  case ('checkout'):
    include 'page/checkout.php';
    break;

  case ('account'):
    include 'page/account.php';
    break;

  case ('editaccount'):
    include 'page/edit-account.php';
    break;

  case ('login'):
    include 'page/login.php';
    break;
}
