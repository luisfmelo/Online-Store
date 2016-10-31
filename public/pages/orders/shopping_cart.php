<?php
  include_once('../../config/init.php');
  //print_r($_SESSION['cart']);
  include '../common/header.php';
?>

<h2 class="bigTitle">
  O meu Cesto
</h2>

<article class="cartItem">
  <div class="cartQtt">
    <ul>
      <li>+</li>
      <li><input type="text" name="qnt" value="<?=$_SESSION['cart'][1]?>"></li>
      <li>-</li>
    </ul>
  </div>
</article>
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

<?php include '../common/footer.php';?>
