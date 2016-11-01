<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  $username = $_GET['id'];
  print_r($username);
  
  removeUser($username);
  
  header("Location: $BASE_URL" . '/pages/users/customers.php');
?>
