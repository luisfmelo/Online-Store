<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');

  $username = $_GET['ref'];

  removeUser($username);

  header("Location: $BASE_URL/pages/users/view_customers.php");
  exit;
?>
