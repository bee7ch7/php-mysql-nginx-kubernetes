<?php
include('../inc/database.php');
include('../inc/controller.php');

echo "<pre>";


$connection = new hrinfo();

$get_data = $connection->getEmployees(1);

print_r($get_data);

?>