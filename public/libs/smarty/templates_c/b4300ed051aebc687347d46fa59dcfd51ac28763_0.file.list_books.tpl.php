<?php
/* Smarty version 3.1.30, created on 2017-01-16 18:22:19
  from "/var/www/public/templates/books/list_books.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587d0f5b85f3c4_60157551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4300ed051aebc687347d46fa59dcfd51ac28763' => 
    array (
      0 => '/var/www/public/templates/books/list_books.tpl',
      1 => 1484589378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:books/filter.tpl' => 1,
  ),
),false)) {
function content_587d0f5b85f3c4_60157551 (Smarty_Internal_Template $_smarty_tpl) {
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

          
          <?php if (!$_smarty_tpl->tpl_vars['isADMIN']->value && $_smarty_tpl->tpl_vars['book']->value['stock'] != 0) {?>
            <a class='btn'>
              <i class='fa fa-cart-plus' aria-hidden='true'></i>
              Adicionar
            </a>
          <?php }?>

          
          <?php if ($_smarty_tpl->tpl_vars['book']->value['stock'] != 0) {?>
            <span class='inStock'>
              <small>Em Stock</small>
            </span>
          <?php } elseif ($_smarty_tpl->tpl_vars['book']->value['stock'] == 0) {?>
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
          <?php }?>
          <a class= "favourite">
          <p><?php echo $_smarty_tpl->tpl_vars['ADMIN']->value;?>
</p>
          <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value != '' && !$_smarty_tpl->tpl_vars['isADMIN']->value && in_array($_smarty_tpl->tpl_vars['book']->value['ref'],$_smarty_tpl->tpl_vars['FAVOURITES']->value)) {?>
            <i class="fa fa-heart" aria-hidden="true"></i>
          <?php } elseif ($_smarty_tpl->tpl_vars['USERNAME']->value != '' && !$_smarty_tpl->tpl_vars['isADMIN']->value && !in_array($_smarty_tpl->tpl_vars['book']->value['ref'],$_smarty_tpl->tpl_vars['FAVOURITES']->value)) {?>
            <i class="fa fa-heart-o" aria-hidden="true"></i>
          <?php }?>
            <span hidden><?php echo $_smarty_tpl->tpl_vars['book']->value['ref'];?>
</span>
          </a>
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
      <a>
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
            <a class="pageNumberSelected"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
          <?php } else { ?>
            <a class="pageNumber"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
          <?php }?>
        <?php }
}
?>

      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['next']->value != "NOTHING_TO_SHOW") {?>
        <a>
          <i class='fa fa-angle-double-right' aria-hidden='true'></i>
        </a>
      <?php }?>
	</div>
  <span id='futurePage' style='display:none'>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

  </span>
</div>
<?php }
}
