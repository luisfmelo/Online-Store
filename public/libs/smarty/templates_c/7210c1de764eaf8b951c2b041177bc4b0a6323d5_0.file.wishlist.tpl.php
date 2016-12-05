<?php
/* Smarty version 3.1.30, created on 2016-12-05 11:53:38
  from "/var/www/public/templates/users/wishlist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58455542140c99_82199715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7210c1de764eaf8b951c2b041177bc4b0a6323d5' => 
    array (
      0 => '/var/www/public/templates/users/wishlist.tpl',
      1 => 1480939255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
  ),
),false)) {
function content_58455542140c99_82199715 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Meus Favoritos</span>
    </h2>

    <section id = "book">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BOOKS']->value, 'book');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
?>
        <article class='book'>
          <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/view_book.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
'>
            <?php if (file_exists(((string)$_smarty_tpl->tpl_vars['IMG_DIR']->value)."/covers/".((string)$_smarty_tpl->tpl_vars['book']->value['ref']).".png")) {?>
              <img class='cover' src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
/covers/<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
.png"/>
            <?php } else { ?>
              <img class='cover' src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
/covers/default.png"/>
            <?php }?>
          </a>

          <div class='book-data'>
            <span class='title'>
              <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/view_book.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
' class='titleLink'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value['title'];?>

              </a>
            </span><br />

            <span class='author'><?php echo $_smarty_tpl->tpl_vars['book']->value['author'];?>
</span><br />
            <span class='descript'><?php echo $_smarty_tpl->tpl_vars['book']->value['description'];?>
</span><br />
          </div>

          <div class='addBtn'>
            <span class='price'>€ <?php echo $_smarty_tpl->tpl_vars['book']->value['price'];?>
</span><br />

          
          <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value != '' && !$_smarty_tpl->tpl_vars['isADMIN']->value && $_smarty_tpl->tpl_vars['book']->value['stock'] != 0) {?>
            <a class='btn' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/orders/add_book_to_cart.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
'>
              <i class='fa fa-cart-plus' aria-hidden='true'></i>
              Adicionar
            </a>
            <a class= "favourite">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span hidden><?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
</span>
            </a>
            <?php }?>

            
            
          <?php if ($_smarty_tpl->tpl_vars['book']->value['stock'] != 0 && $_smarty_tpl->tpl_vars['USERNAME']->value != '') {?>
            <span class='inStock'>
              <small>Em Stock</small>
            </span>
          <?php } elseif ($_smarty_tpl->tpl_vars['book']->value['stock'] == 0 && $_smarty_tpl->tpl_vars['USERNAME']->value != '') {?>
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
          <?php }?>
        </div>
        </article>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </section>

  </div>
</div>
<?php }
}
