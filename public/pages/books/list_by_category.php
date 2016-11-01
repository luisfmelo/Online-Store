<!-- DEPRECATED -->

<?php
  include '../common/header.php';
  $ref = $_GET['id'];
  $sort = $_GET['sort'];
  $booksByCategory = getBooksByCategory($ref, $sort);
?>

<?php include 'filter.php';?>

<section id="books">
  <?php
  foreach ($booksByCategory as $book) {
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



<!--<div class="row" style="margin: 2% 5%">
  <?php
  /**foreach ($categories as $cat) {
    echo "<div class='category'><a href='../books/list_books.php?id=" . $cat['ref'] . "'>";
      echo $cat['categoryname'];
    echo "</a></div>";
  }*/
  ?>
</div>-->
