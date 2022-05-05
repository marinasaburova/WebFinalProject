<?php

function getCategories()
{
    // bags, belts, sunglasses, watches, scarves
    global $db;

    $query = "SELECT DISTINCT `category` FROM `item`";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
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

    $query .= " ORDER BY `itemID` DESC";

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

function updateItem($itemID, $name, $price, $quantity, $category, $color, $material, $description, $tags)
{
    global $db;

    $query = 'UPDATE item SET `name` = :name, `price` = :price, `quantity` = :quantity, `category` = :category, `color` = :color, `material` = :material, `description` = :description, `tags` = :tags WHERE `itemID` = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':material', $material);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':tags', $tags);
    $statement->execute();
    $statement->closeCursor();
}

function addItem($name, $price, $quantity, $category, $color, $material, $description, $tags)
{
    global $db;

    $query = 'INSERT INTO item (name, price, quantity, category, color, material, description, tags)
              VALUES (:name, :price, :quantity, :category, :color, :material, :description, :tags)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue('quantity', $quantity);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':material', $material);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':tags', $tags);
    $statement->execute();
    $statement->closeCursor();
}

function uploadItemPhoto($itemID, $image)
{
}

function getItemImage($itemID)
{
    $path = "media/purse.jpg";
    $exts = array('bmp', 'png', 'jpg', 'jpeg');
    foreach ($exts as $ext) {

        if (file_exists("media/" . $itemID . "." . $ext)) {
            $path = "media/" . $itemID . "." . $ext;
        }

        if (file_exists("../media/" . $itemID . "." . $ext)) {
            $path = "../media/" . $itemID . "." . $ext;
        }
    }

    return $path;
}

function deleteItem($itemID)
{
    global $db;

    $query = 'DELETE FROM item WHERE `itemID` = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $statement->closeCursor();
}

function updateOrder($orderID, $status, $email, $shipStreet, $shipStreet2, $shipCity, $shipState, $shipZip)
{
    global $db;

    $query = 'UPDATE orders SET `status` = :status, `email` = :email, `shipStreet` = :shipStreet, `shipStreet2` = :shipStreet2, `shipCity` = :shipCity, `shipState` = :shipState, `shipZip` = :shipZip  WHERE `orderID` = :orderID';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':shipStreet', $shipStreet);
    $statement->bindValue(':shipStreet2', $shipStreet2);
    $statement->bindValue(':shipCity', $shipCity);
    $statement->bindValue(':shipState', $shipState);
    $statement->bindValue(':shipZip', $shipZip);
    $statement->execute();
    $statement->closeCursor();
}

function getAllOrders()
{
    global $db;

    $query = 'SELECT * FROM orders';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}
