<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  $username = $_SESSION['username'];

  $profile = getUserByUsername($username);
  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }

  $smarty->assign('PROFILE', $profile);
  $smarty->assign('USERNAME', $username);

  $smarty->display('common/header.tpl');
  $smarty->display('users/edit_profile.tpl');
  $smarty->display('common/footer.tpl');
?>
