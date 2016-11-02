<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/books.php');
  include_once '../common/header.php';

  $WARN_MESSAGE = '';
  $total = 0;

  if (count($_SESSION['cart']) != 0)
    $books = getSelectedBooks($_SESSION['cart']);
?>
<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>O meu Cesto</span>
      <i class="fa fa-refresh" aria-hidden="true" onclick="updateCart()"></i>
    </h2>

    <section id="cart">
      <?php
    if (count($_SESSION['cart'])!=0)
      foreach ($books as $book) {
        $cover =
          file_exists($IMG_DIR . '/covers/' . $book['ref'] . '.png')      ?
                            $IMG_DIR . '/covers/' . $book['ref'] . '.png' :
                            $IMG_DIR . '/covers/default.png' ;

        echo "<article class='cartItem row'>";
          echo "<img class='cover' src=" . $cover . " />";

          echo "<div class='book-data'>";
            echo "<span class='title'>" . $book['title'] . "</span>
                  <i class='fa fa-trash' aria-hidden='true' onclick=\"deleteItem('" . $book[ref] . "', '" . $book[title] . "')\"></i><br />";
            echo "<span class='author'>" . $book['author'] . "</span><br /><br />";
            echo "<small class='cartQtt'>
                    Quantidade:
                    <input type='text' name='" . $book['ref'] . "' value='" . $_SESSION['cart'][$book['ref']][0] . "'>
                  </small>";
          echo "</div>";

          echo "<div class='addBtn'>";
            if ( $book['stock'] == 0)
            {
              echo "<span class='price'>€ " . 0 . "</span><br />";
              echo "<span class='soldOut'>
                      <small>Esgotado</small>
                    </span>";
              $WARN_MESSAGE = "Nem todos os livros serão expedidos";
            }
            else if ( $book['stock'] < $_SESSION['cart'][$book['ref']][0] )
            {
              echo "<span class='price'>€ " . $book['price'] * $book['stock'] . "</span><br />";
              echo "<span class='warningStock'>
                        <small>Stock Insuficiente<br />(" . $book['stock'] . " unidades)</small>
                      </span>";
              $WARN_MESSAGE = "Nem todos os livros serão expedidos";
              $total = $total + $book['price'] * $book['stock'];
            }
            else
            {
              echo "<span class='price'>€ " . $book['price'] * $_SESSION['cart'][$book['ref']][0] . "</span><br />";
              echo "<span class='inStock'>
                      <small>Em Stock</small>
                    </span>";
              $total = $total + $book['price'] * $_SESSION['cart'][$book['ref']][0];
            }
          echo "</div>";
        echo "</article>";
      }
      ?>
    </section>
    <div class="messages" style="margin-bottom: 20px;">
      <?php include_once('../common/cart_msgs.php'); ?>
    </div>
  </div>
</div>


<div class="checkout">
  <div class="checkoutRow">
    <div>
      <strong>Portes e Envio: </strong>
    </div>
    <div>
      Grátis <br />
    </div>
  </div>
  <div class="checkoutRow">
    <div>
      <strong>Total: </strong>
    </div>
    <div>
      <?=$total?> €
    </div>
  </div>
  <div>
    <a href="<?=$BASE_URL?>/actions/order/checkout.php" id="checkoutBtn">
      Checkout
    </a>
  </div>
</div>

<?php include '../common/footer.php';?>
