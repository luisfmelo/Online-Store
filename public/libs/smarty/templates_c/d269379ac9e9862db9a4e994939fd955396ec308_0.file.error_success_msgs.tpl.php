<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:10:35
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_success_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ec58b4aa874_96209934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd269379ac9e9862db9a4e994939fd955396ec308' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_success_msgs.tpl',
      1 => 1479459114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ec58b4aa874_96209934 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value != '') {?>
  <div class='errorMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>

  </div>
<?php }
if ($_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value != '') {?>
  <div class='successMsg'>
    <i class='fa fa-check' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value;?>

  </div>
<?php }
if ($_smarty_tpl->tpl_vars['INFO_MESSAGE']->value != '') {?>
  <div class='infoMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['INFO_MESSAGE']->value;?>

  </div>
<?php }
}
}
