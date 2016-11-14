<?php
/* Smarty version 3.1.30, created on 2016-10-17 23:48:50
  from "/var/www/html/Fritter/templates/common/menu_logged_in.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58054742c6ee75_99902685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '708979bd30e0d29a5f943c76774b6a025e5008be' => 
    array (
      0 => '/var/www/html/Fritter/templates/common/menu_logged_in.tpl',
      1 => 1476740929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58054742c6ee75_99902685 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/logout.php">Logout</a>
<span class="username"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</span>
<?php }
}
