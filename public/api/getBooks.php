<?php
	include_once('../config/init.php');
  include_once('../database/books.php');
  include_once('../database/users.php');

	$page = $_GET['page'] == '' ? 1 : $_GET['page'];
	$offset = ($page-1) * $_GET['number_Books'];
	$nbooks = $_GET['number_Books'] == '' ? 6 : $_GET['number_Books'];
  $totalBooks = (isset($_GET['id'])) ? TotalNumberBooksByCategory($_GET['id'])[0]['count'] : getNoBooks()[0]['count'];

<<<<<<< HEAD
	// obter livros de acordo com os "parâmetros" de pesquisa seleccionados pelo utilizador *
  if (isset($_GET['id']))
		$books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $nbooks, $offset);
  else
     $books = listSomeBooks('', $_GET['sort'], $nbooks, $offset);
=======
	/* obter livros de acordo com os "parâmetros" de pesquisa seleccionados pelo utilizador */
  if (isset($_GET['id']))
		$books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $nbooks, $offset);
  else
		$books = listSomeBooks('', $_GET['sort'], $nbooks, $offset);

>>>>>>> f90defb55c5358a96619bfa1696094ccc7742f61

	$res = getFavouriteBooks($_SESSION['username']);
  $fav = array();
  foreach ($res as $key => $value) {
		$fav[] = $value[ref];
  }
  $json =  array('username' => $_SESSION['username'], 'admin' => $_SESSION['admin'], 'fav' => $fav, 'page' => $page, 'totalBooks' => $totalBooks, 'nbooks' => $nbooks, 'livros' => $books);
	echo json_encode($json, JSON_FORCE_OBJECT);
?>
