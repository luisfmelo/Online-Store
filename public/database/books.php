<?php
  function getAllBooks($search, $order ) {
    global $conn;
    $query =           'SELECT *
                        FROM e_store.books ';

    if ($search != '')
      $query = $query . "WHERE e_store.books.title ILIKE '%" . $search . "%'";

    if ($order == 'name_a')
      $query = $query . " ORDER BY e_store.books.title ASC";
    else if ($order == 'name_z')
      $query = $query . " ORDER BY e_store.books.title DESC";
    else if ($order == 'price_d')
      $query = $query . " ORDER BY e_store.books.price DESC";
    else if ($order == 'price_c')
      $query = $query . " ORDER BY e_store.books.price ASC";
    else
      $query = $query . " ORDER BY e_store.books.title ASC";



      //"OR e_store.books.author ILIKE '%" . $search . "%'""

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getSomeBooks($limit, $offset){
	global $conn;
    $query =           "SELECT *
                        FROM e_store.books
                        ORDER BY ref ASC
                        LIMIT '$limit' OFFSET '$offset';";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();

   }

  function getBooksByCategory($ref, $order) {
    global $conn;
    $query = "SELECT *
              FROM e_store.categories
              INNER JOIN e_store.books
              ON e_store.categories.id = e_store.books.category
              WHERE e_store.categories.ref = '$ref'";

    if ($order == 'name_a')
      $query = $query . " ORDER BY e_store.books.title ASC";
    else if ($order == 'name_z')
      $query = $query . " ORDER BY e_store.books.title DESC";
    else if ($order == 'price_d')
      $query = $query . " ORDER BY e_store.books.price DESC";
    else if ($order == 'price_c')
      $query = $query . " ORDER BY e_store.books.price ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getBookCategories() {
    global $conn;
    $stmt = $conn->prepare('SELECT *
                            FROM e_store.categories');
                            //ORDER BY time DESC');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getNoBooks() {
	global $conn;
    $stmt = $conn->prepare('SELECT COUNT(id) FROM e_store.books;');

    $stmt->execute();
    return $stmt->fetchAll();
  }

    function deleteBook($ref) {
	global $conn;
	$query =           "DELETE FROM e_store.books
							WHERE ref = '$ref';";
    $stmt = $conn->prepare($query);


    $stmt->execute();
  }

  function getBookPrice($ref){
  global $conn;
  $stmt = $conn->prepare("SELECT price
                          FROM e_store.books
                          WHERE ref = '" . $ref . "'");
                          //ORDER BY time DESC');
  $stmt->execute();
  return $stmt->fetchAll();
}

  function getSelectedBooks($cart)
  {
	  global $conn;

	  $query = "SELECT *
				FROM e_store.books
				WHERE ref in (";

	  foreach($cart as $key => $value) {
		  $query = $query . "'" . $key . "',";
      }

	  $query = substr($query, 0, -1);
	  $query = $query . ');';

	  $stmt = $conn->prepare($query);
	  $stmt->execute();
	  return $stmt->fetchAll();

}

  function updateBook($ref, $price, $stock){
	global $conn;

    $query = "UPDATE e_store.books
              SET price='$price', stock='$stock'
              WHERE ref='$ref';";
	$stmt = $conn->prepare ($query);

    $stmt->execute();
  }
?>
