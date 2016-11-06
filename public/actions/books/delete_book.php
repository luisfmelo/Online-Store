<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $book_ref = $_GET['ref'];

  deleteBook($book_id);

  header("Location: " . $BASE_URL . '/pages/users/stock_management.php?page=' . $page);
  exit;
?>
