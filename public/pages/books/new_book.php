<?php
  include_once('../../config/init.php');
  include_once("$BASE_URL/database/books.php");

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !$_SESSION['admin'])
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }
  $categories = getBookCategories();

  $cover =  $IMG_DIR . '/covers/default.png' ;

  $smarty->assign('CATEGORIES', $categories);
  $smarty->assign('COVER', $cover);

  $smarty->display('common/header.tpl');
  $smarty->display('books/new_book.tpl');
  $smarty->display('common/footer.tpl');
?>
