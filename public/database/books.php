<?php
  function getAllBooks() {
    global $conn;
    $stmt = $conn->prepare('SELECT *
                            FROM e_store.books');
                            //ORDER BY time DESC');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getBooksByCategory($category) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.books JOIN
                                 e_store.category USING (category)
                            WHERE category = '$category'");
                            //ORDER BY time DESC");
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>
