<?php
  include_once('../../config/init.php');

  $_SESSION['redirect'] = $_SERVER['HTTP_REFERER'];

  $smarty->display('users/new_regist.tpl');
?>
