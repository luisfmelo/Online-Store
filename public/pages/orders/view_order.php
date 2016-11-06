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
  else if( !$_SESSION['admin'] && $_SESSION['username'] == $order['username'])
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
					echo "<td class='linkToUser'><a href='../books/view_book.php?id=".$info['ref']."'>" . $info['ref'] .	"</a></td>";
					echo "<td>" . $info['title']		.	"</td>";
					echo "<td>" . $info['price']	.	" €</td>";
					echo "<td>" . $info['quantity']	.	"</td>";
				 echo "</tr>";
			}
			?>
		</table>

		<div class="orderInfo left">
			<span>
				<strong>Data da encomenda:</strong>	<? echo ( $order[0]['orderdate']=="" ) ? "Pendente" : $order[0]['orderdate'];?> <br />
			</span>
			<span>
				<strong>Data de entrega:</strong>	  	<? echo ( $order[0]['deliverydate']=="" ) ? "Em Transporte" : $order[0]['deliverydate'];?> <br />
			</span>
			<span>
				<strong>Valor Total:</strong>		  <?=$order[0]['price'];?> €<br />
			</span>

		</div>
</div>

<?php include '../common/footer.php';?>
