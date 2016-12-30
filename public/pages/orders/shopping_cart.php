<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/books.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( $_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  print_r($_);

  $WARN_MESSAGE = '';
  $total = 0;

  if ($_SESSION['cart_counter'] != 0)
    $books = getSelectedBooks($_SESSION['cart']);

  $cart_items = array();
  $i = 0;

  foreach ($books as $book) {
    $cover =
      file_exists($IMG_DIR . '/covers/' . $book['ref'] . '.png')  ?
                  $IMG_DIR . '/covers/' . $book['ref'] . '.png'   :
                  $IMG_DIR . '/covers/default.png' ;

      if ( $book['stock'] < $_SESSION['cart'][$book['ref']])
        $total = $total + $book['price'] * $book['stock'];
      else
        $total = $total + $book['price'] * $_SESSION['cart'][$book['ref']];

      $cart_items[$i]['cover'] = $cover;
      $cart_items[$i]['title'] = $book['title'];
      $cart_items[$i]['author'] = $book['author'];
      $cart_items[$i]['ref'] = $book['ref'];
      $cart_items[$i]['stock'] = $book['stock'];
      $cart_items[$i]['price'] = $book['price'];
      $cart_items[$i]['qnt'] = $_SESSION['cart'][$book['ref']];

      $i++;
    }

    $_SESSION['total'] = $total;


    $smarty->assign('CART_COUNTER', $_SESSION['cart_counter']);
    $smarty->assign('CART_ITEMS', $cart_items);
    $smarty->assign('BOOKS', $books);
    $smarty->assign('TOTAL', $total);

    $smarty->display('common/header.tpl');
    $smarty->display('orders/shopping_cart.tpl');
    $smarty->display('common/footer.tpl');
?>
