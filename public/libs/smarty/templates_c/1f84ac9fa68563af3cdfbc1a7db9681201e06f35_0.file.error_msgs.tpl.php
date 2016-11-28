<?php
/* Smarty version 3.1.30, created on 2016-11-28 19:46:26
  from "/var/www/public/templates/_messages/error_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583c8992ee5747_71020230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f84ac9fa68563af3cdfbc1a7db9681201e06f35' => 
    array (
      0 => '/var/www/public/templates/_messages/error_msgs.tpl',
      1 => 1480362352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583c8992ee5747_71020230 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE_SPECIAL']->value != '') {?>
  <div class='errorMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE_SPECIAL']->value;?>

  </div>
<?php }
}
}
