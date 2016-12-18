<?php
/* Smarty version 3.1.30, created on 2016-12-18 09:36:03
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/warn_msgs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5856588312e9f3_08832022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e74ee54886e987c0b4b7696e026490a59527c93f' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/_messages/warn_msgs.tpl',
      1 => 1482015816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5856588312e9f3_08832022 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['WARN_MESSAGE']->value != '') {?>
  <div class='warningMsg' style='display:none'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> <?php echo $_smarty_tpl->tpl_vars['WARN_MESSAGE']->value;?>

    <a class="close" href="#">X</a>
  </div>
<?php }
}
}
