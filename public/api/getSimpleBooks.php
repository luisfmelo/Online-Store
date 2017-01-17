<?php
	include_once('../config/init.php');
  include_once('../database/books.php');
  include_once('../database/users.php');

	$books = listSimpleBooks();
  $book = array();
  $all = array();

  foreach ($books as $b) {
    if (file_exists('../images/covers/' . $b['ref'] . '.png'))
      $cover = '../../images/covers/' . $b['ref'] . '.png';
    else
      $cover = '../../images/covers/default.png';

    $book['ref'] = $b['ref'];
    $book['cover'] = $cover;
    $book['title'] = $b['title'];
    $book['author'] = $b['author'];
    array_push($all, $book);

  }

	echo json_encode($all);
?>
