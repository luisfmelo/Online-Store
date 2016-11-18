<?php
/* Smarty version 3.1.30, created on 2016-11-18 11:49:04
  from "/var/www/public/templates/users/stock_management.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582eeab0663de0_94669473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0263e5ae122531e5a363c2d817dc709048eb91b' => 
    array (
      0 => '/var/www/public/templates/users/stock_management.tpl',
      1 => 1479467946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_582eeab0663de0_94669473 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Stock</span>
    </h2>
		<table class="gerir">
			<tr>
				<th> Ref	</th>
				<th> Título		</th>
				<th> Preço 		</th>
				<th> Stock		</th>
				<th> 			</th>
				<th> 			</th>
				<th> 			</th>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BOOKS']->value, 'book');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
?>
				<tr class='<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
'>
					<td class='linkToUser'><a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/view_book.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
</a></td>
					<td class='linkToUser'><a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/view_book.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value['title'];?>
</a></td>
					<td> <input class='stock_input' type='text' name='stock' value='<?php echo $_smarty_tpl->tpl_vars['book']->value['price'];?>
'> </td>
					<td> <input class='stock_input' type='text' name='stock' value='<?php echo $_smarty_tpl->tpl_vars['book']->value['stock'];?>
'> </td>
					<td> <i onclick="deleteBookAlert('<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
')" class="fa fa-trash" aria-hidden="true"></i> </td>
					<td> <i onclick="stockChangeCheck('<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
', '<?php echo $_smarty_tpl->tpl_vars['PAGE']->value;?>
')" class="fa fa-floppy-o" aria-hidden="true"> </i> </td>
			 </tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>

		<div class="row arrows">

		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value != 0) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php?page=<?php echo $_smarty_tpl->tpl_vars['PREVIOUS']->value;?>
">
				<i class='fa fa-angle-double-left' aria-hidden='true'></i>
			</a>
		<?php }?>
		<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['MAX_NO_PAGE']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['MAX_NO_PAGE']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['PAGE']->value) {?>
				<a class="pageNumberSelected" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
 </a>
			<?php } else { ?>
				<a class="pageNumber" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
 </a>
			<?php }?>
		<?php }
}
?>

		<?php if ($_smarty_tpl->tpl_vars['NEXT']->value != "NOTHING_TO_SHOW") {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/stock_management.php?page=<?php echo $_smarty_tpl->tpl_vars['NEXT']->value;?>
">
				<i class='fa fa-angle-double-right' aria-hidden='true'></i>
			</a>
		<?php }?>
		</div>
		<a class="divlink row" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/new_book.php" id="registLink" > Novo Livro </a>
</div>
<?php }
}
