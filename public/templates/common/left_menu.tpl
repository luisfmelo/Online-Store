<div class = "leftContent">

	<a class='itemMenu divlink' href='{$BASE_URL}/pages/users/view_profile.php'>
		Ver Perfil
	</a>

	<a class='itemMenu divlink' href='{$BASE_URL}/pages/users/edit_profile.php'>
		Editar Perfil
	</a>

	<a class='itemMenu divlink' href='{$BASE_URL}/pages/orders/view_orders.php'>
	{if $isADMIN }
		Gerir Encomendas
	{else}
		Minhas Encomendas
	{/if}
	</a>

	{if $isADMIN }
	<a class='itemMenu divlink' href='{$BASE_URL}/pages/users/stock_management.php'>
		Gerir Stock
	</a>

	<a class='itemMenu divlink' href='{$BASE_URL}/pages/users/view_customers.php'>
		Gerir Clientes
	</a>
	{else}
	<a class='itemMenu divlink' href='{$BASE_URL}/pages/orders/shopping_cart.php'>
		Carrinho de Compras
	</a>
	<a class='itemMenu divlink' href='{$BASE_URL}/pages/users/wishlist.php'>
		Meus Favoritos
	</a>
	{/if}
</div>
