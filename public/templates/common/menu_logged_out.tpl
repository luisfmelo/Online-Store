<li>
  <a href="{$BASE_URL}/pages/users/login.php">
    Login
  </a>
</li>
<li>
  <a href="{$BASE_URL}/pages/users/register.php" id="registLink">
    Registo
  </a>
</li>
<li>
  <a href='{$BASE_URL}/pages/orders/shopping_cart.php'>
    {if $CART_COUNTER > 0}
      {$CART_COUNTER}
    {/if}
    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
  </a>
</li>
