<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:18:05
  from "/var/www/html/Online-Store/public/templates/common/left_menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b14d7f4630_41861345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff10fd9b8382038de3a057a0d0e6b6042589b613' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/common/left_menu.tpl',
      1 => 1481820657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b14d7f4630_41861345 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class = "leftContent">

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/view_profile.php'>
		Ver Perfil
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/edit_profile.php'>
		Editar Perfil
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php'>
	<?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
		Gerir Encomendas
	<?php } else { ?>
		Minhas Encomendas
	<?php }?>
	</a>

	<?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php'>
		Gerir Stock
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/view_customers.php'>
		Gerir Clientes
	</a>
	<?php } else { ?>
	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/shopping_cart.php'>
		Carrinho de Compras
	</a>
	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/wishlist.php'>
		Meus Favoritos
	</a>
	<?php }?>
</div>
<?php }
}
