<?php
/* Smarty version 3.1.30, created on 2017-01-07 12:13:50
  from "/var/www/public/templates/_messages/error_success_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5870db7ecb3a62_70063233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83d57f313b124a318368e8f8613e365f7a64010b' => 
    array (
      0 => '/var/www/public/templates/_messages/error_success_msgs.tpl',
      1 => 1483791209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5870db7ecb3a62_70063233 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value != '') {?>
  <div class='successMsg' style='display:none'>
    <i class='fa fa-check' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value != '') {?>
  <div class='errorMsg' style='display:none'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
if ($_smarty_tpl->tpl_vars['INFO_MESSAGE']->value != '') {?>
  <div class='infoMsg' style='display:none'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['INFO_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
