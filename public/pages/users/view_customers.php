<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

	$customers = getCustomers();

  $smarty->assign('CUSTOMERS', $customers);

  $smarty->display('common/header.tpl');
  $smarty->display('users/view_customers.tpl');
  $smarty->display('common/footer.tpl');
?>
