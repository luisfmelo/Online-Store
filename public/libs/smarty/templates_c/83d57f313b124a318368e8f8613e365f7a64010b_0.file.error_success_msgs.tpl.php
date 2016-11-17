<?php
/* Smarty version 3.1.30, created on 2016-11-17 09:52:30
  from "/var/www/public/templates/_messages/error_success_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582d7dde972a18_72321143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83d57f313b124a318368e8f8613e365f7a64010b' => 
    array (
      0 => '/var/www/public/templates/_messages/error_success_msgs.tpl',
      1 => 1479375990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582d7dde972a18_72321143 (Smarty_Internal_Template $_smarty_tpl) {
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
