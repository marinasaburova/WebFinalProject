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
}

function changeCustomerPwd($customerID, $newPwd)
{
}

function getCustomerData($customerID)
{
}

function getDefaultAddr($customer)
{
}

function setDefaultAddr()
{
}

function getOrderHistory($customerID)
{
}

function getOrderDetails($orderID)
{
}

function getOrderItems($orderID)
{
}

function placeOrder()
{
}
