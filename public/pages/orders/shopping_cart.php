<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/books.php');

  include_once '../common/header.php';
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      O meu Cesto
    </h2>
    <!--<section id="cartItems">
      <article class="cartItem row">
        <div class='book-data'>
          <span class='title'>Prevenção de Lesões no Desporto</span><br />
          <span class='author'>Luís Horta</span><br />
          <span class='cartQtt'>Quantidade: <input type="text" name="qnt" value="//$_SESSION['cart'][1]?>"></span><br />
        </div>
        <div class='addBtn'>
          <span class='price'>€ 16.90</span><br />
          <span class='soldOut'>
            <small>Esgotado</small>
          </span>
        </div>
      </article>
    </section>-->
    <section id="cartItems">
      <?php
      foreach ($books as $book) {
        $cover =
          file_exists($IMG_DIR . '/covers/' . $book['ref'] . '.png')      ?
                            $IMG_DIR . '/covers/' . $book['ref'] . '.png' :
                            $IMG_DIR . '/covers/default.png' ;

        echo "<article class='cartItem'>";
          echo "<img class='cover' src=" . $cover . " />";

          echo "<div class='book-data'>";
            echo "<span class='title'>" . $book['title'] . "</span><br />";
            echo "<span class='author'>" . $book['author'] . "</span><br />";
            echo "<span class='cartQtt'>Quantidade: <input type="text" name="qnt" value="$_SESSION['cart'][1]"></span><br />";

          echo "</div>";

          echo "<div class='addBtn'>";
              echo "<span class='price'>€ " . $book['price'] . "</span><br />";
            if ( $book['stock'] != 0 )
                echo "<span class='inStock'>
                        <small>Em Stock</small>
                      </span>";
            else
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
