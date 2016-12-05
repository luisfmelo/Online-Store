<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( $_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }

  $wishlist = getFavouriteBooks($_SESSION['username']);

  $smarty->assign('BOOKS', $wishlist);

  $smarty->display('common/header.tpl');
  $smarty->display('users/wishlist.tpl');
  $smarty->display('common/footer.tpl');
?>
