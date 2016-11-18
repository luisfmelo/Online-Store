<?php
/* Smarty version 3.1.30, created on 2016-11-18 09:33:47
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/menu_logged_in.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ecafb1ba4a3_30822640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe000110f002afd8976d072cff0643ba5f15b236' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/menu_logged_in.tpl',
      1 => 1479461615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ecafb1ba4a3_30822640 (Smarty_Internal_Template $_smarty_tpl) {
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
  <?php }?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/logout.php">Logout</a>
  </div>
</li>


<?php if (!$_smarty_tpl->tpl_vars['isADMIN']->value) {?>
<li>
  <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/shopping_cart.php'>
    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
  </a>
</li>
<?php }
}
}
