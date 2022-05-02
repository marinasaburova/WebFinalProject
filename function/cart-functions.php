<?php
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function addToCart($itemID, $quantity)
{
    if (isset($_SESSION['cart'][$itemID])) {
        $quantity += $_SESSION['cart'][$itemID];
    }

    $_SESSION['cart'][$itemID] = $quantity;
    return;
}

function removeFromCart($itemID)
{
    if (isset($_SESSION['cart'][$itemID])) {
        unset($_SESSION['cart'][$itemID]);
    }
    return;
}

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


function clearCart()
{
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    return;
}

function getCart()
{
    $cart = $_SESSION['cart'];
    return $cart;
}

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

function getTax()
{
    return getCartTotal() * .05;
}

function getShipping()
{
    return 5;
}

function getTotal()
{
    return getCartTotal() + getShipping() + getTax();
}

function getCartNumOfItems()
{
    $cart = $_SESSION['cart'];
    $numOfItems = 0;
    foreach ($cart as $item => $quantity) {
        $numOfItems += $quantity;
    }
    return $numOfItems;
}

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

function canPurchaseCart()
{
    foreach ($_SESSION['cart'] as $item => $quantity) {
        if (!canPurchaseItem($item)) {
            return false;
        }
    }
    return true;
}
