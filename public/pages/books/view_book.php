<?php
  include '../common/header.php';
  include_once('../../database/books.php');
  include_once('../../database/users.php');

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }

  $book = getBookInfo($_GET['id']);

  $cover =
    file_exists($IMG_DIR . '/covers/' . $_GET['id'] . '.png')   ?
                $IMG_DIR . '/covers/' . $_GET['id'] . '.png'    :
                $IMG_DIR . '/covers/default.png' ;
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span><?=$book[0]['title']?>
        <?php
        if (isAdmin($_SESSION['username']))
          echo "<a href='$BASE_URL/pages/books/edit_book.php?id=".$_GET['id']."'>
                  <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                </a>";
        ?>
      </span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	<?=$_GET['id']?> <br />
        </span>
        <span>
          <strong>Titulo:</strong>	  	<?=$book[0]['title'];?> <br />
        </span>
        <span>
          <strong>Autor:</strong>		  <?=$book[0]['author'];?> <br />
        </span>
        <span>
          <strong>Preço:</strong>	<?=$book[0]['price'];?> €<br />
        </span>
        <span>
          <strong>Categoria:</strong>		<?=$book[0]['categoryname'];?> <br />
        </span>
        <span>
          <strong>Stock:</strong>
          <?php
          if (isAdmin($_SESSION['username']))
            echo "$book[0]['stock'] <br />";
          else if ( $book['stock'] !== 0 )
              echo "<span class='inStock'>
                      <small>Em Stock</small>
                    </span><br />";
          else if ( $book['stock'] === 0 )
              echo "<span class='soldOut'>
                      <small>Esgotado</small>
                    </span><br />";
          ?>
        </span>

      </div>
      <div class="right">
        <div class="photo">
          <img src="<?=$cover?>" alt="" />
        </div>
        <div class="changePhoto">
        <!--  <input type="file" id="photoUp" multiple size="50" onchange="uploadPhoto()">-->
        </div>
      </div>
    </section>
    <div class="description row">
      <span>
        <strong>Descrição:</strong>		<?=$book[0]['description'];?> <br />
      </span>
    </div>


    <div class="messages" style="margin-bottom: 20px;">
      <?php include_once('../common/cart_msgs.php'); ?>
    </div>

  </div>
</div>


<?php include '../common/footer.php';?>
