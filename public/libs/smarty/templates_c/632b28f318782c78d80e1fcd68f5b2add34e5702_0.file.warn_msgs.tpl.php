<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:01:56
  from "/var/www/public/templates/_messages/warn_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ed1942ba2e0_46111708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '632b28f318782c78d80e1fcd68f5b2add34e5702' => 
    array (
      0 => '/var/www/public/templates/_messages/warn_msgs.tpl',
      1 => 1479459907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ed1942ba2e0_46111708 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['WARN_MESSAGE']->value != '') {?>
  <div class='warningMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['WARN_MESSAGE']->value;?>

  </div>
<?php }
}
}
