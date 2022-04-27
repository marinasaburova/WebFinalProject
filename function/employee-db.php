<?php

function isValidEmployee($email, $password)
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
    return password_verify($password, $hash);
}


function logoutAdmin()
{
}

function registerEmployee($email, $password, $firstName, $lastName)
{
    global $db;
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $query = 'INSERT INTO employee (email, password, firstName, lastName)
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
}

function updateEmployeePwd($employeeID, $newPwd)
{
}

function getEmployeeID($email)
{
}

function getEmployeeData($employeeID)
{
}
