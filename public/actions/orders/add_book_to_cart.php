<?php
  include_once('../../config/init.php');

  if ( is_null($_SESSION['cart']) )
    $_SESSION['cart'] = array();

  if ( is_null($_SESSION['cart'][$_GET['id']]) )
    $_SESSION['cart'][$_GET['id']] = 1;
  else
    $_SESSION['cart'][$_GET['id']] ++;


  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>
