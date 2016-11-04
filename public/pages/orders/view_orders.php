<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');
  include_once '../common/header.php';
  
  $username = $_SESSION['username'];
  $isAdmin = isAdmin($username);
  print_r($isAdmin);

  if ($isAdmin)
	$orders = getOrdersAdmin();
  else
     $orders = getOrdersCustomer($username);

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
				<?php 
					if ($isAdmin == 1)
						echo "<td> Enviar encomenda </td>";
					else 
						echo "<td> Encomenda recebida </td>";
				?>
			</tr>
			<?php
			foreach ($orders as $order) {
				echo "<tr>";
					echo "<td>" . $order['ref'] .	"</td>";
					if ($isAdmin)				
						echo "<td>" . $order['username'] .	"</td>";
					echo "<td>" . $order['price'].			"</td>";
					echo "<td>" . $order['orderdate']	.	"</td>";
					echo "<td>" . $order['deliverydate'].	"</td>";
					echo "<td>" .$order['orderstatename'].  "</td>";
					if ( $isAdmin && ($order['orderstatename'] == "PENDENTE"))
							echo "<td> <input type=\"checkbox\" onchange=\"alertStateChange('" . $order['ref'] ."', '" . $isAdmin ."')\" name=\"orderstate\" > </td>";
					else if ( !$isAdmin && ($order['orderstatename'] == "ENVIADO"))
							echo "<td> <input type=\"checkbox\" onchange=\"alertStateChange('" . $order['ref'] ."', '" . $isAdmin ."')\" name=\"orderstate\" > </td>";
				echo "</tr>";
			}						
		   ?>		
		</table>	
	</section>

</section>

<?php include '../common/footer.php';?>
