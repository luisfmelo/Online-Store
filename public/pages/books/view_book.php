<?php
	include '../common/header.php';
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/book.php');
  
  $book = getBookInfo($_GET['id']); //falta getBookInfo em books.php (database)

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !isAdmin($_SESSION['username']) && $_SESSION['username'] == $order['username'])
  {
  	header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Livro: <?=$_GET['id']?></span>
    </h2>
		<table class="gerir gerirClientes">
			<tr>
				<th> Referência	</th>
				<th> Titulo		</th>
				<th> Autor		</th>
				<th> Stock  	</th>
				<th> Preço   	</th>
			</tr>
			<?php
			foreach ($book as $info) {
				echo "<tr>";
						echo "<td>" . $info['ref'] .	"</a></td>";
						echo "<td>" . $info['title']		.	"</td>";
						echo "<td>" . $info['author']	.	" </td>";
						echo "<td>" . $info['stock']	.	"</td>";
						echo "<td>" . $info['price']	.	"€</td>";
				 echo "</tr>";
			}
			?>
		</table>
</div>

<?php include '../common/footer.php';?>
