<?php

function isValidAdmin($email, $pwd)
{
    global $db;
    $query = 'SELECT `password` FROM `employee`
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
    return password_verify($pwd, $hash);
}

function logoutAdmin()
{
    $_SESSION = array();
    session_destroy();
    header('Location: .');
}

function registerEmployee($email, $pwd, $firstName, $lastName)
{
    global $db;
    $hash = password_hash($pwd, PASSWORD_BCRYPT);
    $query = 'INSERT INTO employee (email, pwd, firstName, lastName)
              VALUES (:email, :password, :firstName, :lastName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

function updateEmployee($employeeID, $email, $firstName, $lastName)
{
    global $db;

    $query = 'UPDATE employee SET `email` = :email, `firstName` = :firstName, `lastName` = :lastName WHERE `employeeID` = :employeeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':employeeID', $employeeID);
    $statement->execute();
    $statement->closeCursor();
}

function updateEmployeePwd($employeeID, $newPwd)
{
    global $db;

    $hash = password_hash($newPwd, PASSWORD_BCRYPT);

    $query = 'UPDATE employee SET `password` = :hash WHERE `employeeID` = :employeeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':hash', $hash);
    $statement->bindValue(':employeeID', $employeeID);
    $statement->execute();
    $statement->closeCursor();
}
