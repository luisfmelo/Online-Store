<?php
	include '../common/header.php';
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
	$order = getOrderInfo($_GET['id']);

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
      <span>Encomenda: <?=$_GET['id']?></span>
    </h2>
		<table class="gerir gerirClientes">
			<tr>
				<th> Livro	</th>
				<th> Titulo		</th>
				<th> Preço		</th>
				<th> Quantidade	</th>
			</tr>
			<?php
			foreach ($order as $info) {
				echo "<tr>";
						echo "<td>" . $info['ref'] .	"</a></td>";
						echo "<td>" . $info['title']		.	"</td>";
						echo "<td>" . $info['price']	.	" €</td>";
						echo "<td>" . $info['quantity']	.	"</td>";
				 echo "</tr>";
			}
			?>
		</table>
</div>

<?php include '../common/footer.php';?>
