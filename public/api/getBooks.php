<?php
	include_once('../config/init.php');
  include_once('../database/books.php');
  include_once('../database/users.php');

	$page   = $_GET['page'] == '' ? 1 : $_GET['page'];
	$offset = ($page-1) * $_GET['number_Books'];
	$nbooks = $_GET['number_Books'] == '' ? 6 : $_GET['number_Books'];
	$search = isset($_GET['search']) ? $_GET['search']  : '';
	$n      = isset($_GET['search']) ? TotalNumberSearchedBooks($_GET['search'])['count'] : getNoBooks()[0]['count'];
  $totalBooks = (isset($_GET['id'])) ? TotalNumberBooksByCategory($_GET['id'])[0]['count'] : $n;

	/* obter livros de acordo com os "parâmetros" de pesquisa seleccionados pelo utilizador */
  if (isset($_GET['id']))
		$books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $nbooks, $offset);
  else
		$books = listSomeBooks($search, $_GET['sort'], $nbooks, $offset);

	$res = getFavouriteBooks($_SESSION['username']);
  $fav = array();
  foreach ($res as $key => $value) {
		$fav[] = $value[ref];
  }
  $json =  array('username' => $_SESSION['username'], 'admin' => $_SESSION['admin'], 'fav' => $fav, 'page' => $page, 'totalBooks' => $totalBooks, 'nbooks' => $nbooks, 'livros' => $books);
	echo json_encode($json, JSON_FORCE_OBJECT);
?>
