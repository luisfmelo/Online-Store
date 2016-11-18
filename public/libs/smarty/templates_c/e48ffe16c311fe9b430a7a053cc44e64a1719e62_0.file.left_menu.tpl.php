<?php
/* Smarty version 3.1.30, created on 2016-11-18 09:53:03
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/left_menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ecf7f1a8a40_23585809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e48ffe16c311fe9b430a7a053cc44e64a1719e62' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/left_menu.tpl',
      1 => 1479459114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ecf7f1a8a40_23585809 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class = "leftContent">

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/users/view_profile.php'>
		Ver Perfil
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/users/edit_profile.php'>
		Editar Perfil
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/orders/view_orders.php'>
	<?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
		Gerir Encomendas
	<?php } else { ?>
		Minhas Encomendas
	<?php }?>
	</a>

	<?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/users/stock_management.php'>
		Gerir Stock
	</a>

	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/users/view_customers.php'>
		Gerir Clientes
	</a>
	<?php } else { ?>
	<a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
/pages/orders/shopping_cart.php'>
		Carrinho de Compras
	</a>
	<?php }?>
</div>
<?php }
}
