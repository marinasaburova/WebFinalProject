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

  case ('cart'):
    include 'page/cart.php';
}
