<?php

function getCategories()
{
    // bags, belts, sunglasses, watches, scarves
}

function getProducts($category, $color, $material)
{
    global $db;

    $query = 'SELECT * FROM `item` WHERE `quantity` > 0';

    if ($category != 'all') {
        $query .= ' AND `category` = :category';
    }

    if ($color != 'all') {
        $query .= " AND `color` = :color";
    }

    if ($material != 'all') {
        $query .= " AND `material` = :material";
    }

    $statement = $db->prepare($query);

    if ($category != 'all') {
        $statement->bindValue(':category', $category);
    }

    if ($color != 'all') {
        $statement->bindValue(':color', $color);
    }

    if ($material != 'all') {
        $statement->bindValue(':material', $material);
    }

    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function getProductDetails($itemID)
{
    global $db;

    $query = 'SELECT * FROM `item` WHERE `itemID` = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

/*
function isInStock($itemID)
{
    global $db;
    $query = 'SELECT `quantity` FROM `item` WHERE `itemID` = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    if ($row['quantity'] > 0) {
        return true;
    } else {
        return false;
    }
} */

function getColors()
{
    global $db;

    $query = "SELECT DISTINCT `color` FROM `item`";
    $statement = $db->prepare($query);
    $statement->execute();
    $colors = $statement->fetchAll();
    $statement->closeCursor();
    return $colors;
}

function getMaterials()
{
    global $db;

    $query = "SELECT DISTINCT `material` FROM `item`";
    $statement = $db->prepare($query);
    $statement->execute();
    $colors = $statement->fetchAll();
    $statement->closeCursor();
    return $colors;
}


function keywordSearch($searchterm, $category)
{
    global $db;

    $query = 'SELECT * FROM `item` WHERE `quantity` > 0 AND ((`name` like :searchterm) OR (`description` like :searchterm) OR (`tags` like :searchterm))';
    if ($category != 'all') {
        $query .= ' AND `category` = :category';
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':searchterm', "%$searchterm%");
    $statement->bindValue(':category', $category);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function subtractItemQuantity($itemID, $quantity)
{
    global $db;

    $item = getProductDetails($itemID);
    $currentQuantity = $item['quantity'];
    $newQuantity = $currentQuantity - $quantity;

    if ($newQuantity < 0) {
        echo 'Out of stock!';
        return;
    }

    $query = 'UPDATE `item` SET `quantity` = :quantity WHERE `itemID` = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':quantity', $newQuantity);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $statement->closeCursor();
}

function updateItem($itemID)
{
}

function addItem($itemID)
{
}

function deleteItem($itemID)
{
}

function updateOrderStatus($orderID, $status)
{
}

function getAllOrders()
{
}
