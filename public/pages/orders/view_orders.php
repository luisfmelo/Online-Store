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

  /* página atual */
  if(!isset($_GET['page']))
	$page = 0;
  else
	$page = $_GET['page'];

  /* controlo icons previous/next */
  $number_books_per_page = 10;
  $number_of_orders = getNoOrders();
  $max_no_page = $number_of_orders[0]['count'] /  $number_books_per_page;

  if ($page + 1 > $max_no_page)
		$next = "NOTHING_TO_SHOW";
  else
		$next = $page + 1;

  $previous = $page - 1;

	$sort 			= isset($_GET['sort']) ?  $_GET['sort'] :
																				"-";
	$sortParams = isset($_GET['sort']) ?  "&sort=$sort" :
																				"";
  /* obter encomendas conforme se trate de um cliente ou admin */
  if ($isAdmin)
		$orders = getOrdersAdmin($number_books_per_page, $page * $number_books_per_page, $_GET['sort']);
  else
  	$orders = getOrdersCustomer($username,$number_books_per_page, $page * $number_books_per_page);

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
						echo "<th>
										Cliente
										<i class='fa fa-arrow-down' aria-hidden='true' onclick='sortOrders(\"down\")'></i>
										<i class='fa fa-arrow-up' aria-hidden='true' onclick='sortOrders(\"up\")'></i>
									</th>";
				?>
				<!--<th> Valor				</th>-->
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
					echo "<td class='linkToUser'><a href='../orders/view_order.php?id=".$order['ref']."'>" . $order['ref'] .	"</a></td>";
					if ($isAdmin)
						echo "<td class='linkToUser'><a href='../users/view_profile.php?user=".$order['username']."'>" . $order['username'] .	"</a></td>";
					//echo "<td>" . $order['price'].			" € </td>";
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
	<div class="row arrows">
		<?php
			if ($page != 0)
				echo "<a href=\"$BASE_URL/pages/orders/view_orders.php?page=$previous\">
					<i class='fa fa-angle-double-left' aria-hidden='true'></i>
				</a>";
			for ($i = 0; $i < $max_no_page; $i++){
				$number = $i + 1;
				if ($i == $page)
					echo "<a class=\"pageNumberSelected\" href=\"$BASE_URL/pages/orders/view_orders.php?page=$i".$sortParams."\">" .$number . "</a>";
				else
					echo "<a class=\"pageNumber\" href=\"$BASE_URL/pages/orders/view_orders.php?page=$i".$sortParams."\">" .$number . "</a>";
			}
			if ($next != "NOTHING_TO_SHOW")
				echo "<a href=\"$BASE_URL/pages/orders/view_orders.php?page=$next\">
					<i class='fa fa-angle-double-right' aria-hidden='true'></i>
				</a>";
		?>
	</div>
  </div>

</div>

<?php include '../common/footer.php';?>
