<?php
/* Smarty version 3.1.30, created on 2016-11-20 14:59:00
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/warn_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5831ba34a92c09_30244497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e74ee54886e987c0b4b7696e026490a59527c93f' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/warn_msgs.tpl',
      1 => 1479461615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5831ba34a92c09_30244497 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['WARN_MESSAGE']->value != '') {?>
  <div class='warningMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['WARN_MESSAGE']->value;?>

  </div>
<?php }
}
}
