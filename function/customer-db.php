<?php

function isValidLogin($email, $password)
{
    global $db;
    $query = 'SELECT `password` FROM `customer`
              WHERE `email` = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    if ($row == null) {
        return false;
    }
    $hash = $row['password'];
    $statement->closeCursor();
    return password_verify($password, $hash);
}

function logout()
{
    $_SESSION = array();
    session_destroy();
    header('Location: .');
}

function registerCustomer($email, $password, $firstName, $lastName)
{
    global $db;
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $query = 'INSERT INTO customer (email, password, firstName, lastName)
              VALUES (:email, :password, :firstName, :lastName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

function updateCustomer($customerID, $email, $firstName, $lastName)
{
    global $db;

    $query = 'UPDATE customer SET `email` = :email, `firstName` = :firstName, `lastName` = :lastName WHERE `customerID` = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}

function updatePassword($customerID, $newPassword)
{
    global $db;

    $hash = password_hash($newPassword, PASSWORD_BCRYPT);

    $query = 'UPDATE customer SET `password` = :hash WHERE `customerID` = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':hash', $hash);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}

function getCustomerData($customerID)
{
    global $db;

    $query = 'SELECT * FROM `customer` WHERE `customerID` = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function getCustomerID($email)
{
    global $db;
    $query = "SELECT `customerID` FROM `customer` WHERE `email` = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer['customerID'];
}

function updateDefaultAddr($customerID, $firstName, $lastName, $street, $street2, $city, $state, $zip)
{
    global $db;

    $query = 'UPDATE customer SET `shipFirstName` = :firstName, `shipLastName` = :lastName, `shipStreet` = :street, `shipStreet2` = :street2, `shipCity` = :city, `shipState` = :state, `shipZip` = :zip WHERE `customerID` = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':street2', $street2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}

function getOrderHistory($customerID)
{
    global $db;

    $query = 'SELECT * FROM `orders` WHERE `customerID` = :customerID ORDER BY `timePlaced` DESC';

    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function searchOrder($email, $orderID)
{
    global $db;

    $query = 'SELECT * FROM `orders` WHERE `orderID` = :orderID AND `email` = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    if ($row) {
        return true;
    } else {
        return false;
    }
}

function getOrderDetails($orderID)
{
    global $db;

    $query = 'SELECT * FROM `orders` WHERE `orderID` = :orderID';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->execute();
    $orderInfo = $statement->fetch();
    $statement->closeCursor();
    return $orderInfo;
}

function getOrderItems($orderID)
{
    global $db;

    $query = 'SELECT `order_items`.*, `item`.`name` FROM `order_items` INNER JOIN `item` ON `order_items`.`itemID` = `item`.`itemID`  WHERE `orderID` = :orderID';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function placeOrder($customerID, $email, $firstName, $lastName, $street, $street2, $city, $state, $zip)
{
    global $db;

    $itemsPrice = getCartTotal();
    $tax = getCartTax();
    $shipping = getCartShipping();
    $cart = $_SESSION['cart'];

    $query = 'INSERT INTO `orders` (`customerID`, `email`, `itemsPrice`, `shipping`, `tax`, `status`, `shipFirstName`, `shipLastName`, `shipStreet`, `shipStreet2`, `shipCity`, `shipState`, `shipZip`)
              VALUES (:customerID, :email, :itemsPrice, :shipping, :tax, :status, :shipFirstName, :shipLastName, :shipStreet, :shipStreet2, :shipCity, :shipState, :shipZip)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':itemsPrice', $itemsPrice);
    $statement->bindValue(':shipping', $shipping);
    $statement->bindValue(':tax', $tax);
    $statement->bindValue(':status', 'placed');
    $statement->bindValue(':shipFirstName', $firstName);
    $statement->bindValue(':shipLastName', $lastName);
    $statement->bindValue(':shipStreet', $street);
    $statement->bindValue(':shipStreet2', $street2);
    $statement->bindValue(':shipCity', $city);
    $statement->bindValue(':shipState', $state);
    $statement->bindValue(':shipZip', $zip);

    $statement->execute();
    $statement->closeCursor();

    $orderID = $db->lastInsertId();

    foreach ($cart as $item => $quantity) {
        $product = getProductDetails($item);
        $price = $product['price'];

        $query2 = 'INSERT INTO `order_items` (`orderID`, `itemID`, `quantity`, `price`)
        VALUES (:orderID, :itemID, :quantity, :price)';
        $statement2 = $db->prepare($query2);

        $statement2->bindValue(':orderID', $orderID);
        $statement2->bindValue(':itemID', $item);
        $statement2->bindValue(':quantity', $quantity);
        $statement2->bindValue(':price', $price);

        $statement2->execute();
        $statement2->closeCursor();
    }

    clearCart();
    return $orderID;
}

function getCartTax()
{
    $price = getCartTotal();
    $tax = $price * 0.05;
    return $tax;
}

function getCartShipping()
{
    return 5;
}
