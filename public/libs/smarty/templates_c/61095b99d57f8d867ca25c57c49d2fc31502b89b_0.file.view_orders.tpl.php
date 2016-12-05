<?php
/* Smarty version 3.1.30, created on 2016-11-28 11:17:29
  from "/var/www/public/templates/orders/view_orders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583c1249ece3f5_70183854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61095b99d57f8d867ca25c57c49d2fc31502b89b' => 
    array (
      0 => '/var/www/public/templates/orders/view_orders.tpl',
      1 => 1479757358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_583c1249ece3f5_70183854 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
							<i class='fa fa-arrow-down sortOrders' aria-hidden='true'></i>
							<i class='fa fa-arrow-up sortOrders' aria-hidden='true'></i>
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


		<div class="row arrows">
			<?php if ($_smarty_tpl->tpl_vars['page']->value != 1) {?>
				  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php?page=<?php echo $_smarty_tpl->tpl_vars['previous']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
\">
				<i class='fa fa-angle-double-left' aria-hidden='true'></i>
			  </a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['max_no_page']->value > 1) {?>
			  <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['max_no_page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max_no_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
				<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
				  <a class="pageNumberSelected" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
				<?php } else { ?>
				  <a class="pageNumber" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
				<?php }?>
			  <?php }
}
?>

			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['next']->value != "NOTHING_TO_SHOW") {?>
			  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/view_orders.php?page=<?php echo $_smarty_tpl->tpl_vars['next']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
">
				<i class='fa fa-angle-double-right' aria-hidden='true'></i>
			  </a>
			<?php }?>
		</div>
	</div>
</div>
<?php }
}