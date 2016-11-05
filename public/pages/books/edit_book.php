<?php
  include '../common/header.php';
  include_once('../../database/users.php');
  include_once('../../database/books.php');

  $username = $_SESSION['username'];

  $book = getBookInfo($_GET['id']);
  $categories = getBookCategories();
  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( !isAdmin($_SESSION['username']) )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	<?=$_GET['id']?> <br />
        </span>
        <form method="POST" action= "<?=$BASE_URL?>/actions/books/change_book.php" class="myForms" id="editBook">
    			Titulo:  <br />
          <input type = "text" name="title" value="<?=$book[0]['title']?>"/><br>
    			Autor:  <br />
          <input type = "text"		name="author"	value="<?=$book[0]['author']?>"/><br>
    			Preço:  <br />
          <input type = "text"		name="price"	value="<?=$book[0]['price']?>"/><br>
          Categoria: <br />
          <Select name="category">
            <?php
            foreach ($categories as $category)
            {
              echo "<Option value='" .$category['id']. "'";
              if ($category['id'] == $book[0]['category'])
                echo " selected";
              echo  ">" . $category['categoryname'] . "</Option> <br/>";
            }
            ?>
          </Select><br />
    			Stock:  <br />
          <input type = "text"		name="stock"	value="<?=$book[0]['stock']?>"/><br>
          Descrição:		<br />
          <textarea rows="13" cols="50" name="description" value="dd"><?=$book[0]['description']?></textarea> <br />

    			<input type = "submit" name="cmdsubmit" value="Alterar"/>

    		</form>

      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      <?php include_once('../common/cart_msgs.php'); ?>
    </div>

  </div>
</div>
<?php include '../common/footer.php';?>
