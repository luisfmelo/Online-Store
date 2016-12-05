<?php
/* Smarty version 3.1.30, created on 2016-12-05 12:22:03
  from "/var/www/public/templates/common/menu_logged_in.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58455beb7242c1_75620103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cfaa70e56ca4e457ba367d117164af8989988e1' => 
    array (
      0 => '/var/www/public/templates/common/menu_logged_in.tpl',
      1 => 1480940964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58455beb7242c1_75620103 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/logout.php">
    <i class="fa fa-sign-out" aria-hidden="true"></i>
  </a>
</li>

<li class="dropdown">
  <a href='../users/view_profile.php'>
    <?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>

  </a>
  <div class="dropdown-content">
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/view_profile.php">Ver Perfil</a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/edit_profile.php">Editar Perfil</a>
  <?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php'>Gerir Encomendas</a>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php'>Gerir Stock</a>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/view_customers.php'>Gerir Clientes</a>
  <?php } else { ?>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php'>Minhas Encomendas</a>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/shopping_cart.php'>Carrinho de Compras</a>
    <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/wishlist.php'>Meus Favoritos</a>
  <?php }?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/logout.php">Logout</a>
  </div>
</li>


<?php if (!$_smarty_tpl->tpl_vars['isADMIN']->value) {?>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/wishlist.php">
    <i class="fa fa-heart-o" aria-hidden="true"></i>
  </a>
</li>

<li>
  <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/shopping_cart.php'>
    <?php if ($_smarty_tpl->tpl_vars['CART_COUNTER']->value > 0) {?>
      <?php echo $_smarty_tpl->tpl_vars['CART_COUNTER']->value;?>

    <?php }?>
    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
  </a>
</li>

<?php }
}
}
