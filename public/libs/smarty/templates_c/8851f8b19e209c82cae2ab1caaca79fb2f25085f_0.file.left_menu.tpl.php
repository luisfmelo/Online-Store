<?php
/* Smarty version 3.1.30, created on 2016-12-05 11:53:38
  from "/var/www/public/templates/common/left_menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58455542166065_93015966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8851f8b19e209c82cae2ab1caaca79fb2f25085f' => 
    array (
      0 => '/var/www/public/templates/common/left_menu.tpl',
      1 => 1480939259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58455542166065_93015966 (Smarty_Internal_Template $_smarty_tpl) {
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
