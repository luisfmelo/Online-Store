<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $username = $_SESSION['username'];
  $isAdmin = isAdmin($username);
?>

<div class = "leftContent">

	<a class='itemMenu divlink' href='../users/view_profile.php'>
		Ver Perfil
	</a>

	<a class='itemMenu divlink' href='../users/edit_profile.php'>
		Editar Perfil
	</a>

	<a class='itemMenu divlink' href='../orders/view_orders.php'>
		<?php
		if ($isAdmin) echo "Gerir Encomendas";
		else 				  echo "Minhas Encomendas";
		?>
	</a>

	<?php
	if ($isAdmin){
		echo "<a class='itemMenu divlink' href='../users/stock_management.php'>";
			echo "Gerir Stock";
		echo "</a>";

		echo "<a class='itemMenu divlink' href='../users/view_customers.php'>";
			echo "Gerir Clientes";
		echo "</a>";
	}
	else{
		echo "<a class='itemMenu divlink' href='../orders/shopping_cart.php'>";
			echo "Carrinho de Compras";
		echo "</a>";
	}
	?>
</div>
