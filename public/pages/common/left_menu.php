<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $username = $_SESSION['username']; 
  
  $isAdmin = isAdmin($username);

?>

<section id = "leftmenu">
	
	<div class="row">
		<div class='left_options'>
			<a href='../users/view_profile.php'>
				Ver Perfil
			</a>
		</div>
	</div>
	
	<div class="row">
		<div class='left_options'>
			<a href='../users/edit_profile.php'>
				Editar Perfil
			</a>
		</div>
	</div>
	
	<div class="row">
		<div class='left_options'>
			<?php if (isAdmin == true) echo"<a href='../users/orders_admin.php'> Encomendas </a>";
				  else echo"<a href='../users/orders_client.php'> Encomendas </a>";
			?>
		</div>
	</div>
	
	<?php 
	if ($isAdmin == true){
		
		echo "<div class=\"row\">";
			echo "<div class='left_options'>";
				echo "<a href='../users/stock_management.php'>";
					echo "Gerir Stock";
				echo "</a>";
			echo "</div>";
		echo"</div>";
		
		echo "<div class=\"row\">";
			echo "<div class='left_options'>";
				echo "<a href='../users/customers.php'>";
					echo "Clientes";
				echo "</a>";
			echo "</div>";
		echo"</div>";
	}
	else{
		echo "<div class=\"row\">";
			echo "<div class='left_options'>";
				echo "<a href='../users/shopping_cart.php'>";
					echo "Carrinho de Compras";
				echo "</a>";
			echo "</div>";
		echo"</div>";
	}
	?>
	

	
</section>
