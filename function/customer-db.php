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

function changeCustomerPwd($customerID, $newPwd)
{
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

function getDefaultAddr($customer)
{
}

function setDefaultAddr($customerID, $firstName, $lastName, $street, $street2, $city, $state, $zip)
{
    global $db;

    $query = 'UPDATE customer SET (`shipFirstName` = :firstName, `shipLastName` = :lastName, `shipStreet` = :street, `shipStreet2` = :street2, `shipCity` = :city, `shipState` = :state), `shipZip` = :zip WHERE `customerID` = :customerID';
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

    $query = 'SELECT * FROM `orders` WHERE `customerID` = :customerID';

    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
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
}

function placeOrder()
{
}
