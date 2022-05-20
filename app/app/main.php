<?php

include('../inc/database.php');
include('../inc/controller.php');


header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

session_start();
if(!$_SESSION['isLogged']) {
  header("location:../index.php");
  die();
}
session_write_close();


echo "<pre>";


$connection = new hrinfo();

$get_data = $connection->getEmployees(1);

print_r($get_data);


?>