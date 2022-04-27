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
