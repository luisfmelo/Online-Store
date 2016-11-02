<?php

  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');
  
  $book_ref = $_GET['ref'];
  print_r($book_ref);
  
  //~ deleteBook($book_id);
	
?>
