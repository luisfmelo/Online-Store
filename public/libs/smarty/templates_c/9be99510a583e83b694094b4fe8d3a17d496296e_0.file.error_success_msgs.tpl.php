<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:27:07
  from "/var/www/html/Online-Store/public/templates/_messages/error_success_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b36b3338f5_40007188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9be99510a583e83b694094b4fe8d3a17d496296e' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/_messages/error_success_msgs.tpl',
      1 => 1481880261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b36b3338f5_40007188 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value != '') {?>
  <div class='errorMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
if ($_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value != '') {?>
  <div class='successMsg'>
    <i class='fa fa-check' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['SUCCESS_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
if ($_smarty_tpl->tpl_vars['INFO_MESSAGE']->value != '') {?>
  <div class='infoMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['INFO_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
