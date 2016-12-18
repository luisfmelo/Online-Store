<?php
/* Smarty version 3.1.30, created on 2016-12-18 09:36:00
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/msg_cart_added.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58565880f19788_90878317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e9852e23167cbe934ef081d5f5987ad54be565' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/msg_cart_added.tpl',
      1 => 1482015816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58565880f19788_90878317 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CART_MESSAGE']->value != '') {?>
  <div class='infoMsg' style='display:none'>
    <i class='fa fa-cart-plus' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['CART_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
