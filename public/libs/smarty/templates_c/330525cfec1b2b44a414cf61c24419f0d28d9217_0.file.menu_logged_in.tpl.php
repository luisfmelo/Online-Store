<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:27:13
  from "/var/www/html/Online-Store/public/templates/common/menu_logged_in.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b371872568_88674429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '330525cfec1b2b44a414cf61c24419f0d28d9217' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/common/menu_logged_in.tpl',
      1 => 1481880048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b371872568_88674429 (Smarty_Internal_Template $_smarty_tpl) {
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
