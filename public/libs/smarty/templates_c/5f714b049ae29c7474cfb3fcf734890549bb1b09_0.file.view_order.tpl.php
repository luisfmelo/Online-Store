<?php
/* Smarty version 3.1.30, created on 2016-12-12 12:11:02
  from "/var/www/public/templates/orders/view_order.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584e93d6778f18_18289885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f714b049ae29c7474cfb3fcf734890549bb1b09' => 
    array (
      0 => '/var/www/public/templates/orders/view_order.tpl',
      1 => 1480935658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_584e93d6778f18_18289885 (Smarty_Internal_Template $_smarty_tpl) {
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
