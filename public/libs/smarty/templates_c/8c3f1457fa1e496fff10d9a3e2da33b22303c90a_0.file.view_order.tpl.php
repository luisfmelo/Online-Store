<?php
/* Smarty version 3.1.30, created on 2016-11-20 16:00:40
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/view_order.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5831c8a83a8cb5_70529908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c3f1457fa1e496fff10d9a3e2da33b22303c90a' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/view_order.tpl',
      1 => 1479657634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_5831c8a83a8cb5_70529908 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class ="row">
	<?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<div class="rightContent">
		
		<h2 class="bigTitle">
		  <span>Encomenda: <?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
 </span>
		</h2>
		
		<table class="gerir gerirClientes">
			<tr>
				<th> Livro	</th>
				<th> Titulo		</th>
				<th> Preço		</th>
				<th> Quantidade	</th>
			</tr>
		
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ORDER']->value, 'info');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
?>
				<tr>
					<td class='linkToUser'> <a href='../books/view_book.php?id=<?php echo $_smarty_tpl->tpl_vars['info']->value['ref'];?>
'> <?php echo $_smarty_tpl->tpl_vars['info']->value['ref'];?>
 </a></td>			
					<td> <?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
		</td>
					<td> <?php echo $_smarty_tpl->tpl_vars['info']->value['price'];?>
€		</td>
					<td> <?php echo $_smarty_tpl->tpl_vars['info']->value['quantity'];?>
	</td>
				 </tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
		
		
		<div class="orderInfo left">
			<span>
				<strong> Data da encomenda: </strong> <?php echo $_smarty_tpl->tpl_vars['ORDER']->value[0]['orderdate'];?>
 <br />
			</span>
			
			<?php if ((!is_null($_smarty_tpl->tpl_vars['ORDER']->value[0]['deliverydate']))) {?>
				<span>
					<strong>Data de entrega:</strong> <?php echo $_smarty_tpl->tpl_vars['ORDER']->value[0]['deliverydate'];?>
 <br />
				</span>
			<?php }?>
			<span>
				<strong>Valor Total:</strong> <?php echo $_smarty_tpl->tpl_vars['ORDER']->value[0]['price'];?>
 €<br />
			</span>
		</div>
	
	</div>
</div>


<?php }
}
