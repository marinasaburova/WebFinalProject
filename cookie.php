<?php
//setcookie($name, $value, $expire, $path, $domain, $secure, $httponly); 

// Setting a cookie
$name = 'userid';
$value = '87';
$expire = strtotime('+1 year');
$path = '/';
setcookie($name, $value, $expire, $path);

// Getting value of cookie from browser 
$userid = filter_input(INPUT_COOKIE, 'userid', FILTER_VALIDATE_INT);

// Deleting cookie from browser
$expire = strtotime('-1 year');
setcookie('userid', '', $expire, '/');
