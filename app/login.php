<?php
include('inc/func.php');

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

session_start();

$db_user = "user1";
$db_pass = "password1";

$login = test_input($_POST['uname']);
$password = test_input($_POST['psw']);

if ($login == $db_user and $db_pass == $password) {

    $_SESSION['isLogged'] = $login;
    header('Location: app/main.php');
    exit();

} else {
    header('Location: index.php');
    exit();
}

?>