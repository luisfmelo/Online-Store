<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $val = $_GET["search"];

  header('Location: ' . $BASE_URL . '/pages/books/list_all.php?search=' . $val);
?>
