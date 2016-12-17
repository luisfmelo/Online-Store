<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:01:51
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853bb8f2b47a2_87564925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '149373ae0f1373bc589a6f6d636a3b9caf734f3b' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/error_msgs.tpl',
      1 => 1480370271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853bb8f2b47a2_87564925 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE_SPECIAL']->value != '') {?>
  <div class='errorMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE_SPECIAL']->value;?>

  </div>
<?php }
}
}
