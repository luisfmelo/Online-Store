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



      //"OR e_store.books.author ILIKE '%" . $search . "%'""

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getSomeBooks($limit, $offset){
	global $conn;
    $query =           "SELECT *
                        FROM e_store.books
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
              WHERE e_store.categories.ref = $ref";

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

  function getBookPrice($ref){
  global $conn;
  $stmt = $conn->prepare("SELECT price
                          FROM e_store.books
                          WHERE ref='" . $ref . "'");
                          //ORDER BY time DESC');
  $stmt->execute();
  return $stmt->fetchAll();
}
?>
