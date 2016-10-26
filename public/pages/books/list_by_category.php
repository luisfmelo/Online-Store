<?php
  include '../common/header.php';
  $ref = $_GET['id'];

  $booksByCategory = getBooksByCategory($ref);
?>

<section id="books">
  <?php
  foreach ($booksByCategory as $book) {
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
