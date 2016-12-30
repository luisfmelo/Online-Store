<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');
  include_once('../../database/users.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }

  $book = getBookInfo($_GET['id']);

  $cover =
    file_exists($IMG_DIR . '/covers/' . $_GET['id'] . '.png')   ?
                $IMG_DIR . '/covers/' . $_GET['id'] . '.png'    :
                $IMG_DIR . '/covers/default.png' ;

  $smarty->assign('BOOK', $book);
  $smarty->assign('COVER', $cover);
  $smarty->assign('isADMIN', $_SESSION['admin']);

  $smarty->display('common/header.tpl');
  $smarty->display('books/view_book.tpl');
  $smarty->display('common/footer.tpl');
?>
