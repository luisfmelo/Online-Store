<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');
  include_once '../common/header.php';
  
  $username = $_SESSION['username'];
  $isAdmin = isAdmin($username);
  //~ print_r($isAdmin);

  $orders = getOrdersByUsername($isAdmin, $username);
  //~ print_r($orders);

  $states = getOrdersState();
  print_r($states);
?>

<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>

	<section id = "content">
		<table>
			<tr>
				<td> Referência			</td>

				<?php 
					if ($isAdmin == 1) 
						echo "<td> Cliente </td>";
				?>
				<td> Preço				</td>
				<td> Data de encomenda	</td>
				<td> Data de entrega	</td>
				<td> Estado				</td>
			</tr>
			<?php
			foreach ($orders as $order) {
				echo "<tr>";
					echo "<td>" . $order['ref'] .	"</td>";
					if ($isAdmin)				
						echo "<td>" . $order['username'] .	"</td>";
					echo "<td>" . $order['price'].			"</td>";
					echo "<td>" . $order['orderdate']	.	"</td>";
					echo "<td>" . $order['deliverydate']	.	"</td>";
					if ($isAdmin == 1){
						echo"<td>
							 <select id=\"selectState\" onchange=\"alertStateChange('" . $order['ref'] ."' )\">";
									foreach ($states as $state) 
										echo "<option value='" .$state['orderstatename']. "'>" . $state['orderstatename'] . "</option>";
							echo"</select>";
						echo"</td>";
					}
					else
						echo "<td>" .$order['orderstatename']. "</td>";
				echo "<tr>";
			}						
		   ?>		
		</table>
	</section>

</section>

<?php include '../common/footer.php';?>
