<?php
/* Smarty version 3.1.30, created on 2016-12-16 10:27:07
  from "/var/www/html/Online-Store/public/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853b36b31eed8_58293060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e33823707a979c7de49b5003bad33fa5cf488951' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/common/menu_logged_out.tpl',
      1 => 1481880048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b36b31eed8_58293060 (Smarty_Internal_Template $_smarty_tpl) {
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
