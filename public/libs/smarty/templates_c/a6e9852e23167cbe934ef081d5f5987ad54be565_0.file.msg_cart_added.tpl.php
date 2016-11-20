<?php
/* Smarty version 3.1.30, created on 2016-11-20 14:49:57
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/msg_cart_added.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5831b81582d162_16721346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e9852e23167cbe934ef081d5f5987ad54be565' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/msg_cart_added.tpl',
      1 => 1479461614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5831b81582d162_16721346 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CART_MESSAGE']->value != '') {?>
  <div class='infoMsg'>
    <i class='fa fa-cart-plus' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['CART_MESSAGE']->value;?>

  </div>
<?php }
}
}
