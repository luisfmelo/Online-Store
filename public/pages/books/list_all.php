<?php
  include '../common/header.php';

  if ( isset($_GET['search']) )
    $books = getAllBooks($_GET['search']);
  else
    $books = getAllBooks('');
?>

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

<?php include '../common/footer.php';?>
