<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');
  include_once '../common/header.php';

  $username = $_SESSION['username'];
  $isAdmin = isAdmin($username);

  if ($isAdmin)
	 $orders = getOrdersAdmin();
  else
     $orders = getOrdersCustomer($username);
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
	  
    <h2 class="bigTitle">
      <span>Gerir Encomendas</span>
    </h2>
    
    <table class="gerir">
			<tr>
				<th> Referência			</th>

				<?php
					if ($isAdmin == 1)
						echo "<th> Cliente </th>";
				?>
				<th> Preço				</th>
				<th> Data de encomenda	</th>
				<th> Data de entrega	</th>
				<th> Estado				</th>
				<?php
					if ($isAdmin == 1)
						echo "<th> Enviar encomenda </th>";
					else
						echo "<th> Encomenda recebida </th>";
				?>
			</tr>
			<?php
			foreach ($orders as $order) {
				echo "<tr>";
					echo "<td>" . $order['ref'] .	"</td>";
					if ($isAdmin)
						echo "<td>" . $order['username'] .	"</td>";
					echo "<td>" . $order['price'].			" € </td>";
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
  </div>

</div>

<?php include '../common/footer.php';?>
