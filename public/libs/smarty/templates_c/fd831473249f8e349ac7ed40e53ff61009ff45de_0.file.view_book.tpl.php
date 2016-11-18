<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:11:28
  from "/var/www/public/templates/books/view_book.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ed3d013f441_53656059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd831473249f8e349ac7ed40e53ff61009ff45de' => 
    array (
      0 => '/var/www/public/templates/books/view_book.tpl',
      1 => 1479463887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_582ed3d013f441_53656059 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span><?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['title'];?>

      <?php if ($_smarty_tpl->tpl_vars['isADMIN']->value) {?>
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/edit_book.php?id=<?php echo $_GET['id'];?>
'>
          <i class='fa fa-pencil' aria-hidden='true'></i>
        </a>
      <?php }?>
      </span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	<?php echo $_GET['id'];?>
 <br />
        </span>
        <span>
          <strong>Titulo:</strong>	  	<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['title'];?>
 <br />
        </span>
        <span>
          <strong>Autor:</strong>		  <?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['author'];?>
 <br />
        </span>
        <span>
          <strong>Preço:</strong>	<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['price'];?>
 €<br />
        </span>
        <span>
          <strong>Categoria:</strong>		<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['categoryname'];?>
 <br />
        </span>
        <span>
          <strong>Stock:</strong>
          <?php if ('isADMIN') {?>
            <?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['stock'];?>
<br />
          <?php } elseif ($_smarty_tpl->tpl_vars['BOOK']->value['stock'] !== 0) {?>
            <span class='inStock'>
              <small>Em Stock</small>
            </span><br />
          <?php } elseif ($_smarty_tpl->tpl_vars['BOOK']->value['stock'] === 0) {?>
            <span class='soldOut'>
              <small>Esgotado</small>
            </span><br />
          <?php }?>
        </span>
      </div>
      <div class="right">
        <div class="photo">
          <img src="<?php echo $_smarty_tpl->tpl_vars['COVER']->value;?>
" alt="" />
        </div>
        <div class="changePhoto">
        <!--  <input type="file" id="photoUp" multiple size="50" onchange="uploadPhoto()">-->
        </div>
      </div>
    </section>
    <div class="description row">
      <span>
        <strong>Descrição:</strong>		<?php echo $_smarty_tpl->tpl_vars['BOOK']->value[0]['description'];?>
 <br />
      </span>
    </div>


    <div class="messages" style="margin-bottom: 20px;">
      <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

  </div>
</div>
<?php }
}
