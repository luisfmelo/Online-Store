<?php
/* Smarty version 3.1.30, created on 2016-11-21 17:03:55
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/view_customers.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583328fb9e77a9_26979642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd309a856c64b94a20594678376394f308055cfdb' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/view_customers.tpl',
      1 => 1479653191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_583328fb9e77a9_26979642 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Clientes</span>
    </h2>
		<table class="gerir gerirClientes">
			<tr>
				<th> Username	</th>
				<th> Name		</th>
				<th> Email		</th>
				<th> Telefone	</th>
				<th> Morada		</th>
				<th>	</th>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CUSTOMERS']->value, 'customer');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customer']->value) {
?>
				<tr>
					<td class='linkToUser'><a href='view_profile.php?user=<?php echo $_smarty_tpl->tpl_vars['customer']->value['username'];?>
'><?php echo $_smarty_tpl->tpl_vars['customer']->value['username'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['email'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['phone'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['address'];?>
</td>
					<td> <i onclick="deleteCustomerAlert('<?php echo $_smarty_tpl->tpl_vars['customer']->value['username'];?>
')" class="fa fa-trash" aria-hidden="true"></i> </td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
</div>
<?php }
}
