<?php
/* Smarty version 3.1.30, created on 2016-12-20 10:53:21
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/books/edit_book.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58590da1904f25_71150808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faf503ee40ec42fd48c6b79c5aad26564f962e2e' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/books/edit_book.tpl',
      1 => 1482230845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages/error_success_msgs.tpl' => 1,
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_58590da1904f25_71150808 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="messages" style="margin-top: -20px;">
  <?php $_smarty_tpl->_subTemplateRender("file:_messages/error_success_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	<?php echo $_GET['id'];?>
 <br />
        </span>
        <form id="editBook" enctype="multipart/form-data" ref="<?php echo $_GET['id'];?>
" class="myForms" name="EditBook" method="post" action= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/books/edit_book.php?id=<?php echo $_GET['id'];?>
">
    			Titulo:  <br />
          <input type = "text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['title'];?>
"/><br>
    			Autor:  <br />
          <input type = "text"		name="author"	value="<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['author'];?>
"/><br>
    			Preço:  <br />
          <input type = "text"		name="price"	value="<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['price'];?>
"/><br>
          Categoria: <br />
          <Select name="category">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIES']->value, 'CAT');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CAT']->value) {
?>
            <Option value='<?php echo $_smarty_tpl->tpl_vars['CAT']->value['id'];?>
'
              <?php if ($_smarty_tpl->tpl_vars['CAT']->value['id'] == $_smarty_tpl->tpl_vars['BOOK']->value[0]['category']) {?>
                selected
              <?php }?>
              ><?php echo $_smarty_tpl->tpl_vars['CAT']->value['categoryname'];?>
</Option> <br/>";
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </Select><br />
    			Stock:  <br />
          <input type = "text"		name="stock"	value="<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['stock'];?>
"/><br>
          Descrição:		<br />
          <textarea rows="13" cols="50" name="description" value="dd"><?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['description'];?>
</textarea> <br />
          
           <Select name="state">
            <Option value='ativo'
              <?php if ($_smarty_tpl->tpl_vars['BOOK']->value[0]['active']) {?>
                selected
              <?php }?>
              >Ativo</Option> <br/>
             <Option value='descontinuado'
              <?php if (!$_smarty_tpl->tpl_vars['BOOK']->value[0]['active']) {?>
                selected
              <?php }?>
              >Descontinuado</Option> <br/>
          </Select><br />
		
		 <input style="margin-left:0" class="changePhoto" name="bookcover" type="file" id="photoUp"  />
		
          <div class="messages formMessages" style="margin-top: 20px;">
            <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </div>
	  
          <input type = "submit" value="Alterar"/>
    		</form>

      </div>
    </section>

  </div>
</div>

<!--
ADICIONAR DROP DOWN MENU COM DESCONTINUADO, ...
ADICIONAR ESTADO AO VIEW_BOOK-->
<?php }
}
