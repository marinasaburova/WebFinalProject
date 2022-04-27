<?php
// make sure the user is logged in as a valid administrator
if (!isset($_SESSION['emploggedin'])) {
    header('Location: .?action=login');
    exit;
}
