<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

if (isset($_COOKIE['user_name'])) {
    unset($_COOKIE['user_name']); 
    setcookie('user_name', null, -1, '/');
    unset($_COOKIE['type']);
    setcookie('type', null, -1, '/');
    unset($_COOKIE['class']);
    setcookie('class', null, -1, '/');
    unset($_COOKIE['teacherName']);
    setcookie('teacherName', null, -1, '/');
}
// Redirect to login page
header("location: index.php");
exit;
?>