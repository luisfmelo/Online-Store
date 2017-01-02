<?php
  include_once('../../config/init.php');

  $_SESSION['redirect'] = $_SERVER['HTTP_REFERER'];
  
  if ( $_SESSION['username'] !== '' )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  $smarty->display('users/register.tpl');
?>
