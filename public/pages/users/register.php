<?php
  include_once('../../config/init.php');

  if ( $_SESSION['username'] != '' )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  $smarty->display('users/register.tpl');
?>
