<?php
/* Smarty version 3.1.30, created on 2016-10-17 23:43:35
  from "/var/www/html/Fritter/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58054607459690_34594636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aed3dad67ecb4f8e7fe27739543ce07f0c17fc7c' => 
    array (
      0 => '/var/www/html/Fritter/templates/common/menu_logged_out.tpl',
      1 => 1476731523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58054607459690_34594636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }
}
