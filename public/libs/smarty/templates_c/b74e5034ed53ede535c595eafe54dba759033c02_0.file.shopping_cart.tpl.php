<?php
/* Smarty version 3.1.30, created on 2016-12-11 10:00:55
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/shopping_cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584d23d7eee167_64291660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b74e5034ed53ede535c595eafe54dba759033c02' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/orders/shopping_cart.tpl',
      1 => 1481448969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_584d23d7eee167_64291660 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>O meu Carrinho de Compras</span>
      <i class="fa fa-refresh" aria-hidden="true" id='refresh'></i>
    </h2>

    <section id="cart">
    
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CART_ITEMS']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <article class='cartItem row'>
          <img class='cover' src='<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
'/>

          <div class='book-data'>
            <span class='title'><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span>
              <i class='fa fa-trash cartRemove' aria-hidden='true' ref="<?php echo $_smarty_tpl->tpl_vars['item']->value['ref'];?>
"></i><br />
              <span class='author'><?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>
</span><br /><br />
              <small class='cartQtt'>
                Quantidade:
                <input type='text' name='<?php echo $_smarty_tpl->tpl_vars['item']->value['ref'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['item']->value['qnt'];?>
'>
              </small>
          </div>

          <div class='addBtn'>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['stock'] == 0) {?>
            <span class='price'>€ 0</span><br />*}
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
            <?php $_smarty_tpl->_assignInScope('WARN_MESSAGE', "Nem todos os livros serão expedidos");
?>
          <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['stock'] < $_smarty_tpl->tpl_vars['item']->value['qnt']) {?>
            <span class='price'>€ <?php echo $_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['stock'];?>
</span><br />
            <span class='warningStock'>
              <small>Stock Insuficiente<br />(<?php echo $_smarty_tpl->tpl_vars['item']->value['stock'];?>
 unidades)</small>
            </span>
            <?php $_smarty_tpl->_assignInScope('WARN_MESSAGE', "Nem todos os livros serão expedidos");
?>
          <?php } else { ?>
            <span class='price'>€ <?php echo $_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['qnt'];?>
 </span><br / />
            <span class='inStock'>
              <small>Em Stock</small>
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

    <div class="messages" style="margin-bottom: 20px;">
      <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>
  </div>
</div>


<div class="checkout">
  <div class="checkoutRow">
    <div>
      <strong>Portes de Envio: </strong>
    </div>
    <div>
      Grátis <br />
    </div>
  </div>
  <div class="checkoutRow">
    <div>
      <strong>Total: </strong>
    </div>
    <div>
      <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
 €
    </div>
  </div>
  <div>
    <a id="checkoutBtn" class='btn'>
      Checkout
    </a>
  </div>
</div>
<?php }
}