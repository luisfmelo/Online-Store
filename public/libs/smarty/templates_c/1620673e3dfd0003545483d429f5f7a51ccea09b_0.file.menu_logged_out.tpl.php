<?php
/* Smarty version 3.1.30, created on 2016-11-14 12:27:35
  from "/var/www/public/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829adb790dec3_46302978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1620673e3dfd0003545483d429f5f7a51ccea09b' => 
    array (
      0 => '/var/www/public/templates/common/menu_logged_out.tpl',
      1 => 1479125955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5829adb790dec3_46302978 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/login.php">
    Login
  </a>
</li>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/new_regist.php" id="registLink">
    Registo
  </a>
</li>
<?php }
}
