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
<<<<<<< HEAD
    return password_verify($pwd, $hash);
=======
    return password_verify($password, $hash);
>>>>>>> 505493b646acc62f6831e33a530478093b8cf78b
}


function logoutAdmin()
{
    $_SESSION = array();
    session_destroy();
    header('Location: .');
}

function registerEmployee($email, $password, $firstName, $lastName)
{
    global $db;
<<<<<<< HEAD
    $hash = password_hash($pwd, PASSWORD_BCRYPT);
    $query = 'INSERT INTO employee (email, pwd, firstName, lastName)
=======
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $query = 'INSERT INTO employee (email, password, firstName, lastName)
>>>>>>> 505493b646acc62f6831e33a530478093b8cf78b
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
<<<<<<< HEAD
=======
{
}

function getEmployeeID($email)
{
}

function getEmployeeData($employeeID)
>>>>>>> 505493b646acc62f6831e33a530478093b8cf78b
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
