<?php
  include_once('../../config/init.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  $smarty->display('common/header.tpl');
  $smarty->display('common/contactus.tpl');
  $smarty->display('common/footer.tpl');
?>
