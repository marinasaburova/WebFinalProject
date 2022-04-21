<?php

function isValidLogin($email, $password)
{

    if ($password === '1234') {
        return true;
    } else {
        return false;
    }
    /*
    global $db;
    $query = 'SELECT `password` FROM customer
              WHERE `email` = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    return password_verify($password, $hash);*/
}

function logout()
{
    session_destroy();
    header('Location: .');
}
