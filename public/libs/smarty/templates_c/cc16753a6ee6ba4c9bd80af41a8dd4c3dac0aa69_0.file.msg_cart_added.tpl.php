<?php
/* Smarty version 3.1.30, created on 2017-01-07 12:13:50
  from "/var/www/public/templates/_messages/msg_cart_added.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5870db7eccd674_50580395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc16753a6ee6ba4c9bd80af41a8dd4c3dac0aa69' => 
    array (
      0 => '/var/www/public/templates/_messages/msg_cart_added.tpl',
      1 => 1483791209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5870db7eccd674_50580395 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CART_MESSAGE']->value != '') {?>
  <div class='infoMsg' style='display:none'>
    <i class='fa fa-cart-plus' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['CART_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
