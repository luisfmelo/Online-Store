<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/books.php');

  $books = getAllBooks();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blook</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
    <section id="books">
      <?php
      foreach ($books as $book) {
        echo "<article class='book'>";
          echo "<div class='book-data'>";
            echo "<span class='title'>" . $book['title'] . "</span>";
            echo "<span class='price'>€ " . $book['price'] . "</span>";
          echo "</div>";
        echo "</article>";
      }
      ?>
    </section>
  </body>
</html>
