<?php
	include_once('../config/init.php');
      include_once('../database/books.php');
      include_once('../database/users.php');

	$page = $_GET['page'] == '' ? 1 : $_GET['page'];
	$offset = ($page-1) * $_GET['number_Books'];
	$nbooks = $_GET['number_Books'] == '' ? 6 : $_GET['number_Books'];

	$books = listSomeBooks('', $_GET['sort'], $nbooks, $offset);

      $res = getFavouriteBooks($_SESSION['username']);
      $fav = array();
      foreach ($res as $key => $value) {
            $fav[] = $value[ref];
      }

/*	foreach ($books as $book) {
        $heart = (in_array($book[ref], $fav)) ? "fa-heart" : "fa-heart-o";
        $cover =
          file_exists('../images/covers/' . $book['ref'] . '.png')      ?
                      '../../images/covers/' . $book['ref'] . '.png'    :
                      '../../images/covers/default.png' ;
        echo "<article class='book'>";
          echo "<a href='$BASE_URL/pages/books/view_book.php?id=".$book['ref']."'>
                  <img class='cover' src=" . $cover . " />
                </a>";
          echo "<div class='book-data'>";
            echo "<span class='title'>
                    <a href='$BASE_URL/pages/books/view_book.php?id=".$book['ref']."' class='titleLink'>
                      ".$book['title']."
                    </a>
                  </span><br />";
            echo "<span class='author'>" . $book['author'] . "</span><br />";
            echo "<span class='descript'>" . $book['description'] . "</span><br />";
          echo "</div>";
          echo "<div class='addBtn'>";
              echo "<span class='price'>€ " . $book['price'] . "</span><br />";
            // So mostra botão de adicionar se não for admin, tiver sessao iniciada e ainda haver em stock
            if ( $_SESSION['username'] != '' && !$_SESSION['admin']  && $book['stock'] != 0)
              echo"<a class='btn' href='" . $BASE_URL . "/actions/orders/add_book_to_cart.php?id=" . $book['ref'] . "'><i class='fa fa-cart-plus' aria-hidden='true'></i>
                      Adicionar
                   </a>
                   <a class= 'favourite'>
                        <i class='fa ".$heart."' aria-hidden='true'></i>
			      <span hidden>".$book['stock']."</span>
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

*/
	echo json_encode($books);
?>
