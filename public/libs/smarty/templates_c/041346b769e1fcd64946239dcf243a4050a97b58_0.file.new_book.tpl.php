<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:01:56
  from "/var/www/public/templates/books/new_book.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ed194285ef5_77006081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '041346b769e1fcd64946239dcf243a4050a97b58' => 
    array (
      0 => '/var/www/public/templates/books/new_book.tpl',
      1 => 1479462941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_582ed194285ef5_77006081 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Adicionar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form id="newBook" class="myForms">
    			Titulo:		<br />
          <input type = "text"	name="title"/> <br />
    			Autor:		<br />
          <input type = "text"	name="author"/> <br />
    			Descrição:		<br />
          <textarea rows="6" cols="50" name="description"></textarea> <br />
    			Categoria: <br />
          <Select name="category">
    				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIES']->value, 'CAT');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CAT']->value) {
?>
    					<Option value='<?php echo $_smarty_tpl->tpl_vars['CAT']->value['categoryname'];?>
'><?php echo $_smarty_tpl->tpl_vars['CAT']->value['categoryname'];?>
</Option> <br/>";
    				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    			</Select>
    			<br>
    			Preço:		<br />
          <input type = "text"	name="price"		</input> <br>
    			Stock:		<br />
          <input type = "text"	name="stock"		</input> <br>

    			<input type = "button" onClick="NewBookCheck()" value="Adicionar"></input>
    		</form>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

  </div>
</div>
<?php }
}