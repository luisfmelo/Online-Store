<li>
  <a href="{$BASE_URL}/actions/users/logout.php">
    <i class="fa fa-sign-out" aria-hidden="true"></i>
  </a>
</li>

<li class="dropdown">
  <a href='../users/view_profile.php'>
    {$USERNAME}
  </a>
  <div class="dropdown-content">
    <a href="{$BASE_URL}/pages/users/view_profile.php">Ver Perfil</a>
    <a href="{$BASE_URL}/pages/users/edit_profile.php">Editar Perfil</a>
  {if $isADMIN }
    <a href='{$BASE_URL}/pages/orders/view_orders.php'>Gerir Encomendas</a>
    <a href='{$BASE_URL}/pages/users/stock_management.php'>Gerir Stock</a>
    <a href='{$BASE_URL}/pages/users/view_customers.php'>Gerir Clientes</a>
  {else}
    <a href='{$BASE_URL}/pages/orders/view_orders.php'>Minhas Encomendas</a>
    <a href='{$BASE_URL}/pages/orders/shopping_cart.php'>Carrinho de Compras</a>
    <a href='{$BASE_URL}/pages/users/wishlist.php'>Meus Favoritos</a>
  {/if}

    <a href="{$BASE_URL}/actions/users/logout.php">Logout</a>
  </div>
</li>


{if ! $isADMIN }
<li>
  <a href="{$BASE_URL}/pages/users/wishlist.php">
    <i class="fa fa-heart-o" aria-hidden="true"></i>
  </a>
</li>

<li>
  <a href='{$BASE_URL}/pages/orders/shopping_cart.php' id='cart'>
    <span>
      {if $CART_COUNTER > 0}
        {$CART_COUNTER}
        {/if}
    </span>
    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
  </a>
</li>

{/if}
