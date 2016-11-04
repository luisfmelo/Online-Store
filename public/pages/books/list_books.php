<?php
  include '../common/header.php';

  if (isset($_GET['id']))
    $books = getBooksByCategory($_GET['id'], $_GET['sort']);
  else
    $books = getAllBooks($_GET['search'], $_GET['sort']);

  $categories = getBookCategories();
?>

<!-- LISTA DE CATEGORIAS - ALINHADA À ESQUERDA -->
<div class="row">
  <div class="leftContent">
    <a class='itemMenu divlink' href='../books/list_books.php?'>
        Todos os Livros
    </a>
  <?php
  foreach ($categories as $cat) {
    echo "<a class='itemMenu divlink' href='list_books.php?id=" . $cat['ref'] . "'>";
      echo $cat['categoryname'];
    echo "</a>";
  }
  ?>
  </div>

<!-- LISTA DE LIVROS - ALINHADOS A DIREITA -->
  <div class="rightContent">
  <?php include 'filter.php';?>

    <section id="books">
      <?php
      foreach ($books as $book) {
        $cover =
          file_exists($IMG_DIR . '/covers/' . $book['ref'] . '.png')  ?
                      $IMG_DIR . '/covers/' . $book['ref'] . '.png'   :
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

            // So mostra botão de adicionar se não for admin, tiver sessao iniciada e ainda haver em stock
            if ( $_SESSION['username'] != '' && !$_SESSION['admin']  && $book['stock'] != 0)
              echo "<a href='" . $BASE_URL . "/actions/orders/add_book_to_cart.php?id=" . $book['ref'] . "'><i class='fa fa-cart-plus' aria-hidden='true'></i>
                      <small>Adicionar</small>
                    </a>";

            // Caso não tenha em stock, mostra Esgotado
            // Em caso de não haver user logado, não mostra informação de stock
            if ( $book['stock'] !== 0 && $_SESSION['username'] != '' )
                echo "<span class='inStock'>
                        <small>Em Stock</small>
                      </span>";
            else if ( $book['stock'] === 0 && $_SESSION['username'] != '')
                echo "<span class='soldOut'>
                        <small>Esgotado</small>
                      </span>";

          echo "</div>";
        echo "</article>";
      }
      ?>
    </section>
  </div>
</div>

<?php include '../common/footer.php';?>
