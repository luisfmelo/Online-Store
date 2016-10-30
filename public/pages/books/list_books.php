<?php
  include '../common/header.php';


  if (isset($_GET['id']))
    $books = getBooksByCategory($_GET['id'], $_GET['sort']);
  else
    $books = getAllBooks($_GET['search'], $_GET['sort']);
?>

<?php include 'filter.php';?>

  <section id="books">
    <?php
    foreach ($books as $book) {
      echo "<article class='book'>";
        echo "<div class='book-data'>";
          echo "<img class='cover' src=" . $book['cover'] . " />";
          echo "<span class='title'>" . $book['title'] . "</span>";
          echo "<span class='price'>€ " . $book['price'] . "</span>";
          if ( $_SESSION['username'] != '')
            echo "<i class='fa fa-plus-circle' aria-hidden='true'></i>";
        echo "</div>";
      echo "</article>";
    }
    ?>
  </section>
<?php include '../common/footer.php';?>
