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
