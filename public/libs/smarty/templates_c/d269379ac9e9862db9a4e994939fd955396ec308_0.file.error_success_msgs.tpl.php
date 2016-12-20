<?php
/* Smarty version 3.1.30, created on 2016-12-18 09:36:00
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_success_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58565880e9d555_87717020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd269379ac9e9862db9a4e994939fd955396ec308' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_success_msgs.tpl',
      1 => 1482015816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58565880e9d555_87717020 (Smarty_Internal_Template $_smarty_tpl) {
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
