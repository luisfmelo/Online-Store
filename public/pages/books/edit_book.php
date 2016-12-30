<?php
  include_once('../../config/init.php');
  include_once("$BASE_URL/database/users.php");
  include_once("$BASE_URL/database/books.php");

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  $username = $_SESSION['username'];

  $book = getBookInfo($_GET['id']);
  $categories = getBookCategories();
  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }

  $cover =
    file_exists($IMG_DIR . '/covers/' . $_GET['id'] . '.png')   ?
                $IMG_DIR . '/covers/' . $_GET['id'] . '.png'    :
                $IMG_DIR . '/covers/default.png' ;


  $smarty->assign('BOOK', $book);
  $smarty->assign('COVER', $cover);
  $smarty->assign('CATEGORIES', $categories);
  $smarty->assign('USERNAME', $username);

  $smarty->display('common/header.tpl');
  $smarty->display('books/edit_book.tpl');
  $smarty->display('common/footer.tpl');
?>
