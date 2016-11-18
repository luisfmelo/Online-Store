<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:08:51
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/view_orders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ed3339ad6a5_18410270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ecf9fe9854327cc7bd57060c61a9aba5e7c1684' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/view_orders.tpl',
      1 => 1479463729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ed3339ad6a5_18410270 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<div class="rightContent">

		<h2 class="bigTitle">
		  
		  <?php if (($_smarty_tpl->tpl_vars['ISADMIN']->value)) {?>
			<span>Gerir Encomendas</span>
		  <?php } else { ?>
			<span>Minhas Encomendas</span>
		  <?php }?>
		  
		</h2>


		<table class="gerir">
				<tr>
					<th> Referência			</th>

					<?php if (($_smarty_tpl->tpl_vars['ISADMIN']->value == 1)) {?>
						<th> Cliente
								<i class='fa fa-arrow-down' aria-hidden='true' onclick='sortOrders("down")'></i>
								<i class='fa fa-arrow-up' aria-hidden='true' onclick='sortOrders("up")'></i>
						</th>
					<?php }?>
						<th> Data de encomenda	</th>
						<th> Data de entrega	</th>
						<th> Estado				</th>
						<th style="border-bottom:0x;"> </th>

				</tr>
				
				<?php if ((count($_smarty_tpl->tpl_vars['ORDERS']->value) == 0)) {?>
					<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
				<?php }?>
				
				
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ORDERS']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?> 
					<tr>
						<td class='linkToUser'> <a href='../orders/view_order.php?id=<?php echo $_smarty_tpl->tpl_vars['order']->value['ref'];?>
'> <?php echo $_smarty_tpl->tpl_vars['order']->value['ref'];?>
 </a></td>
						
						<?php if (($_smarty_tpl->tpl_vars['ISADMIN']->value)) {?>
							<td class='linkToUser'><a href='../users/view_profile.php?user=<?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
'> <?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
 </a></td>
						<?php }?>
			
						<td> <?php echo $_smarty_tpl->tpl_vars['order']->value['orderdate'];?>
			</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['order']->value['deliverydate'];?>
	   	</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['order']->value['orderstatename'];?>
	</td>
				

						<?php if (($_smarty_tpl->tpl_vars['ISADMIN']->value && ($_smarty_tpl->tpl_vars['order']->value['orderstatename'] == "PENDENTE"))) {?>
							<td style='border-bottom:0x;'><a class='btn' onclick="alertStateChange(<?php echo $_smarty_tpl->tpl_vars['order']->value['ref'];?>
, <?php echo $_smarty_tpl->tpl_vars['ISADMIN']->value;?>
 )" > Enviar </td>
						<?php } elseif ((!$_smarty_tpl->tpl_vars['ISADMIN']->value && ($_smarty_tpl->tpl_vars['order']->value['orderstatename'] == "ENVIADO"))) {?>
							<td style='border-bottom:0x;'><a class='btn' onclick="alertStateChange(<?php echo $_smarty_tpl->tpl_vars['order']->value['ref'];?>
, <?php echo $_smarty_tpl->tpl_vars['ISADMIN']->value;?>
 )" > Receber </td>
						<?php } else { ?>
							<td> </td>
						<?php }?>
	
					</tr>
				
			   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		</table>

	</div>
</div>
<?php }
}
