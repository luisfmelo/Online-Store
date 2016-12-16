<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:27:13
  from "/var/www/html/Online-Store/public/templates/books/list_books.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b3718faec8_02108294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9c8b64e20fd65356205c25bf70bb00b823855ca' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/books/list_books.tpl',
      1 => 1481880048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:books/filter.tpl' => 1,
  ),
),false)) {
function content_5853b3718faec8_02108294 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- LISTA DE CATEGORIAS - ALINHADA À ESQUERDA -->
<div class="row">
  <div class="leftContent">
    <a class='itemMenu divlink' href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/list_books.php'>
        Todos os Livros
    </a>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIES']->value, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
    <a class='itemMenu divlink' href='list_books.php?id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['ref'];?>
'>
      <?php echo $_smarty_tpl->tpl_vars['cat']->value['categoryname'];?>

    </a>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </div>

<!-- LISTA DE LIVROS - ALINHADOS A DIREITA -->
  <div class="rightContent">
  <?php $_smarty_tpl->_subTemplateRender("file:books/filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <section id="books">
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
            <?php if (in_array($_smarty_tpl->tpl_vars['book']->value['ref'],$_smarty_tpl->tpl_vars['FAVOURITES']->value)) {?>
              <i class="fa fa-heart" aria-hidden="true"></i>
            <?php } else { ?>
              <i class="fa fa-heart-o" aria-hidden="true"></i>
            <?php }?>
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

    <div class="row arrows">
	<?php if ($_smarty_tpl->tpl_vars['page']->value != 1) {?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/list_books.php?page=<?php echo $_smarty_tpl->tpl_vars['previous']->value;
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
/pages/books/list_books.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
        <?php } else { ?>
          <a class="pageNumber" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/list_books.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
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
/pages/books/list_books.php?page=<?php echo $_smarty_tpl->tpl_vars['next']->value;
echo $_smarty_tpl->tpl_vars['param']->value;?>
">
        <i class='fa fa-angle-double-right' aria-hidden='true'></i>
      </a>
    <?php }?>
	</div>
</div>
<?php }
}
