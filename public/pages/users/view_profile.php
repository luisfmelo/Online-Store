<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( !$_SESSION['admin'] && isset($_GET['user']) && $_SESSION['username'] !== $_GET['user'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }

  $username = isset($_GET['user']) ? $_GET['user'] :
                                     $_SESSION['username'];
  $profile = getUserByUsername($username);
  $photo =
    file_exists($IMG_DIR . '/profiles/' . $username . '.png')   ?
                $IMG_DIR . '/profiles/' . $username . '.png'    :
                $IMG_DIR . '/profiles/default.png' ;

  $smarty->assign('PHOTO', $photo);
  $smarty->assign('PROFILE', $profile);
  $smarty->assign('USERNAME', $username);

  $smarty->display('common/header.tpl');
  $smarty->display('users/view_profile.tpl');
  $smarty->display('common/footer.tpl');
?>
