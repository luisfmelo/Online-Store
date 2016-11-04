<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');
  include_once '../common/header.php';

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }

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
				<th> Valor				</th>
				<th> Data de encomenda	</th>
				<th> Data de entrega	</th>
				<th> Estado				</th>
				<th style="border-bottom:0x;"> 				</th>

			</tr>
			<?php
			if (count($orders) == 0)
				echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
			foreach ($orders as $order) {
				echo "<tr>";
					echo "<td>" . $order['ref'] .	"</td>";
					if ($isAdmin)
						echo "<td class='linkToUser'><a href='../users/view_profile.php?user=".$order['username']."'>" . $order['username'] .	"</a></td>";
					echo "<td>" . $order['price'].			" € </td>";
					echo "<td>" . $order['orderdate']	.	"</td>";
					echo "<td>" . $order['deliverydate'].	"</td>";
					echo "<td>" .$order['orderstatename'].  "</td>";
					if ( $isAdmin && ($order['orderstatename'] == "PENDENTE"))
            echo "<td style='border-bottom:0x;'><a class='btn' onclick=\"alertStateChange('" . $order['ref'] ."', '" . $isAdmin ."')\" >Enviar</td>";
					else if ( !$isAdmin && ($order['orderstatename'] == "ENVIADO"))
            echo "<td style='border-bottom:0x;'><a class='btn' onclick=\"alertStateChange('" . $order['ref'] ."', '" . $isAdmin ."')\" >Receber</td>";
          else
             echo "<td></td>";
        echo "</tr>";
			}
		   ?>
		</table>
  </div>

</div>

<?php include '../common/footer.php';?>
