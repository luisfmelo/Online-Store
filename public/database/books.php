<?php
  function getAllBooks($search) {
    global $conn;
    $query =           'SELECT *
                        FROM e_store.books ';

    if ($search != '')
      $query = $query . "WHERE e_store.books.title ILIKE '%" . $search . "%'";

      //"OR e_store.books.author ILIKE '%" . $search . "%'""

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getBooksByCategory($ref) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.categories
                            INNER JOIN e_store.books
                            ON e_store.categories.id = e_store.books.category
                            WHERE e_store.categories.ref = $ref");


                            //ORDER BY time DESC");
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
?>
