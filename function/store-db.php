<?php

function getCategories()
{
    // bags, belts, sunglasses, watches, scarves
}

function getProducts($category)
{
    global $db;

    $query = 'SELECT * FROM `item` WHERE `quantity` > 1';

    if ($category != 'all') {
        $query .= ' AND `category` = :category';
    }

    $statement = $db->prepare($query);

    if ($category != 'all') {
        $statement->bindValue(':category', $category);
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

function updateItem($itemID)
{
    global $db;

    $query = 'INSERT INTO item (itemID, $email, $)
              VALUES (:)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
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
