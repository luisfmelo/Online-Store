<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $username = $_SESSION['username'];
  $isAdmin = isAdmin($username);
?>

<div class = "leftContent">

	<div class='itemMenu'>
		<a href='../users/view_profile.php'>
			Ver Perfil
		</a>
	</div>

	<div class='itemMenu'>
		<a href='../users/edit_profile.php'>
			Editar Perfil
		</a>
	</div>

		<?php
		if ($isAdmin){
			echo "<div class='itemMenu'>";
				echo "<a href='../users/stock_management.php?page_number=0'>";
					echo "Gerir Stock";
				echo "</a>";
			echo "</div>";

			echo "<div class='itemMenu'>";
				echo "<a href='../users/customers.php'>";
					echo "Clientes";
				echo "</a>";
			echo "</div>";
		}
		else{
			echo "<div class='itemMenu'>";
				echo "<a href='../orders/shopping_cart.php'>";
					echo "Carrinho de Compras";
				echo "</a>";
			echo "</div>";
		}
		?>
	<div class='itemMenu'>
		<a href='../orders/view_orders.php'>
		<?php
		if ($isAdmin) echo "Gerir Encomendas";
		else 				  echo "Minhas Encomendas";
		?>
		</a>
	</div>

</div>
