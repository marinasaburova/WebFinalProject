<?php
// functions for managing the cart

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// add an item to cart
function addToCart($itemID, $quantity)
{
    if (isset($_SESSION['cart'][$itemID])) {
        $quantity += $_SESSION['cart'][$itemID];
    }

    $_SESSION['cart'][$itemID] = $quantity;
    return;
}

// remove an item entire (all quantities) from cart
function removeFromCart($itemID)
{
    if (isset($_SESSION['cart'][$itemID])) {
        unset($_SESSION['cart'][$itemID]);
    }
    return;
}

// decrease item quantity by one
function removeOneFromCart($itemID)
{
    if (isset($_SESSION['cart'][$itemID])) {
        if ($_SESSION['cart'][$itemID] <= 1) {
            removeFromCart($itemID);
            return;
        }
        $_SESSION['cart'][$itemID] -= 1;
    }
    return;
}

// clear entire cart
function clearCart()
{
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    return;
}

// get the cart
function getCart()
{
    $cart = $_SESSION['cart'];
    return $cart;
}

// get cart price
function getCartTotal()
{
    $cart = $_SESSION['cart'];
    $total = 0;
    foreach ($cart as $item => $quantity) {
        $product = getProductDetails($item);
        $price = $product['price'];
        $total += ($quantity * $price);
    }

    return $total;
}

// get cart tax
function getTax()
{
    return getCartTotal() * .05;
}

// get cart shipping
function getShipping()
{
    return 5;
}

// get cart total price including shipping & tax
function getTotal()
{
    return getCartTotal() + getShipping() + getTax();
}

// get cart quantity
function getCartNumOfItems()
{
    $cart = $_SESSION['cart'];
    $numOfItems = 0;
    foreach ($cart as $item => $quantity) {
        $numOfItems += $quantity;
    }
    return $numOfItems;
}

// check if item can be added to cart
function canAddToCart($itemID, $quantityAdding)
{
    $item = getProductDetails($itemID);
    $quantityInStock = $item['quantity'];
    if (isset($_SESSION['cart'][$itemID])) {
        $quantityInCart = $_SESSION['cart'][$itemID];
    } else {
        $quantityInCart = 0;
    }

    if ($quantityInStock >= ($quantityInCart + $quantityAdding)) {
        return true;
    } else {
        return false;
    }
}

// check if item can be purchased safely
function canPurchaseItem($itemID)
{
    $item = getProductDetails($itemID);
    $quantityInStock = $item['quantity'];
    if (isset($_SESSION['cart'][$itemID])) {
        $quantityInCart = $_SESSION['cart'][$itemID];
    } else {
        $quantityInCart = 0;
    }

    if ($quantityInStock >= $quantityInCart) {
        return true;
    } else {
        return false;
    }
}

// check if entire cart can be purchased
function canPurchaseCart()
{
    foreach ($_SESSION['cart'] as $item => $quantity) {
        if (!canPurchaseItem($item)) {
            return false;
        }
    }
    return true;
}
