<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:43:13
  from "/var/www/html/Online-Store/public/templates/_messages/msg_cart_added.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b7315f8d61_45958934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92d44a3145e1c02be384bc3fcc71d1bb6ffac1fb' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/_messages/msg_cart_added.tpl',
      1 => 1481881391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b7315f8d61_45958934 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CART_MESSAGE']->value != '') {?>
  <div class='infoMsg' style='display:none'>
    <i class='fa fa-cart-plus' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['CART_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
