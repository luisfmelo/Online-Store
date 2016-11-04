<?php
  include '../common/header.php';

  $categories = getBookCategories();

  /* number page */
  if(isset($_GET['number_Books']))
    $number_books_per_page = $_GET['number_Books'];
  else
    $number_books_per_page = 6;

  if(!isset($_GET['page']))
	$page = 0;
  else
	$page = $_GET['page'];

  $number_of_books = getNoBooks();
  $max_no_page = $number_of_books[0]['count'] / $number_books_per_page;

  if ($page + 1 > $max_no_page)
    $next = "NOTHING_TO_SHOW";
  else
    $next = $page + 1;

  $previous = $page - 1;

  if (isset($_GET['id']))
    $books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $number_books_per_page, $page * $number_books_per_page);
  else
    $books = listSomeBooks($_GET['search'], $_GET['sort'], $number_books_per_page, $page * $number_books_per_page);

  $param = "";
  if (isset($_GET['id']))
	$param = $param . "&id=" . $_GET['id'];
  if (isset($_GET['search']))
	$param = $param . "&search=" . $_GET['search'];
  if (isset($_GET['sort']))
	$param = $param . "&sort=" . $_GET['sort'];
  if (isset($_GET['number_Books']))
	$param = $param . "&number_Books=" . $_GET['number_Books'];

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
    <div class="row arrows">
		<?php
				if ($page != 0)
					echo "<a href=\"$BASE_URL/pages/books/list_books.php?page=$previous" . $param . "\">
						<i class='fa fa-angle-double-left' aria-hidden='true'></i>
					</a>";

				if ($next != "NOTHING_TO_SHOW")
					echo "<a href=\"$BASE_URL/pages/books/list_books.php?page=$next" . $param . "\">
						<i class='fa fa-angle-double-right' aria-hidden='true'></i>
					</a>";
		?>
	</div>

</div>

<?php include '../common/footer.php';?>
