<?php
  include '../common/header.php';

  if (isset($_GET['id']))
    $books = getBooksByCategory($_GET['id'], $_GET['sort']);
  else
    $books = getAllBooks($_GET['search'], $_GET['sort']);

  $categories = getBookCategories();
?>
<div class="row">
  <div class="leftContent">
    <div class='category'>
      <a href='../books/list_books.php?'>
        Todos os Livros
      </a>
    </div>
  <?php
  foreach ($categories as $cat) {
    echo "<div class='category'><a href='list_books.php?id=" . $cat['ref'] . "'>";
      echo $cat['categoryname'];
    echo "</a></div>";
  }
  ?>
  </div>




  <div class="rightContent">
  <?php include 'filter.php';?>

    <section id="books">
      <?php
      foreach ($books as $book) {
        $cover =
          file_exists($IMG_DIR . '/covers/' . $book['ref'] . '.png')      ?
                            $IMG_DIR . '/covers/' . $book['ref'] . '.png' :
                            $IMG_DIR . '/covers/default.png' ;

        echo "<article class='book'>";
          echo "<img class='cover' src=" . $cover . " />";
          echo "<div class='book-data'>";
            echo "<span class='title'>" . $book['title'] . "</span><br />";
            echo "<span class='author'>" . $book['author'] . "</span><br />";
            echo "<span class='descript'>" . $book['description'] . "</span><br />";
          echo "</div>";
          echo "<div class='addBtn'>";
            echo "<span class='price'>€ " . $book['price'] . "</span><br />";
          if ( $_SESSION['username'] != '')
            echo "<a href='" . $BASE_URL . "/actions/orders/add_book_to_cart.php?id=" . $book['ref'] . "'><i class='fa fa-cart-plus' aria-hidden='true'></i>
                    <small>Adicionar</small>
                  </a>";
          echo "</div>";
        echo "</article>";
      }
      ?>
    </section>
  </div>
</div>

<?php include '../common/footer.php';?>
