<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  header('Location: ' . $BASE_URL . '/pages/books/list_books.php?search=' . $_GET["search"]);
  exit;
?>
