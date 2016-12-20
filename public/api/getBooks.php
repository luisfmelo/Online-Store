<?php
	include_once('../config/init.php');
  include_once('../database/books.php');
  include_once('../database/users.php');

	$page = $_GET['page'] == '' ? 1 : $_GET['page'];
	$offset = ($page-1) * $_GET['number_Books'];
	$nbooks = $_GET['number_Books'] == '' ? 6 : $_GET['number_Books'];
  $totalBooks = (isset($_GET['id'])) ? TotalNumberBooksByCategory($_GET['id']) : getNoBooks();

	$books = listSomeBooks('', $_GET['sort'], $nbooks, $offset);

  $res = getFavouriteBooks($_SESSION['username']);
  $fav = array();
  foreach ($res as $key => $value) {
        $fav[] = $value[ref];
  }

  $json =  array('username' => $_SESSION['username'], 'admin' => $_SESSION['admin'], 'fav' => $fav, 'page' => $page, 'totalBooks' => $totalBooks[0]['count'], 'nbooks' => $nbooks, 'livros' => $books);
	echo json_encode($json, JSON_FORCE_OBJECT);
?>
