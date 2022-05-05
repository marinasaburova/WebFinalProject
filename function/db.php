<?php
// connects to database

$dsn = 'mysql:host=localhost;dbname=kelarinadatabase';
$username = 'kelarina';
$password = 'kelarinapass';

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('view/error.php');
    exit();
}
