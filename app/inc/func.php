<?php

function test_input($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function getEnvCreds($path) {

  $ini = parse_ini_file($path, true);
  $mysql_creds = $ini['mysql_creds'];
  return $mysql_creds;
} 

function getEnvTestUserCreds($path) {

  $ini = parse_ini_file($path, true);
  $test_creds = $ini['test_user'];
  return $test_creds;
} 


?>