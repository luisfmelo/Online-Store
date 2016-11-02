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
    <section id="cartItems">
      <article class="cartItem">
        <div class="cartQtt">
          <ul>
            <li>+</li>
            <li><input type="text" name="qnt" value="<?=$_SESSION['cart'][1]?>"></li>
            <li>-</li>
          </ul>
        </div>
      </article>
    </section>
  </div>


  <?php
  /*foreach ($_SESSION['cart'] as $item) {
    echo "<article class='cartItem'>";
      echo "<div class='book-data'>";
        echo "<img class='cover' src=" . $book['cover'] . " />";
        echo "<span class='title'>" . $book['title'] . "</span>";
        echo "<span class='price'>€ " . $book['price'] . "</span>";
        if ( $_SESSION['username'] != '')
          echo "<i class='fa fa-plus-circle' aria-hidden='true'></i>";
      echo "</div>";
    echo "</article>";
  }*/
  ?>
</div>

<?php include '../common/footer.php';?>
