<?php
session_start();
require('dbconnector.php');
$username = filter_input(INPUT_POST, 'uname'); 
$password = filter_input(INPUT_POST, 'psw'); 
$db_handle = new DBController();
$checkUser = $db_handle->numRows("SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
if ($checkUser == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    unset($_SESSION['msg']);
    header('Location: index.php');
} else {
    $_SESSION['msg'] = 'An error occured! Please try again';
    header('Location: index.php');
}
?>
