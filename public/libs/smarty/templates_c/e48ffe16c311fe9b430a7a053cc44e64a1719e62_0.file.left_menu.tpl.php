<?php
/* Smarty version 3.1.30, created on 2016-11-20 14:50:28
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/left_menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5831b834eac763_12997349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e48ffe16c311fe9b430a7a053cc44e64a1719e62' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/left_menu.tpl',
      1 => 1479653190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5831b834eac763_12997349 (Smarty_Internal_Template $_smarty_tpl) {
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
	<?php }?>
</div>
<?php }
}
