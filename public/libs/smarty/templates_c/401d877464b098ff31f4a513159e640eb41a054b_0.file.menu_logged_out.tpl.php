<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:10:31
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ec587651ee5_26265712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '401d877464b098ff31f4a513159e640eb41a054b' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/menu_logged_out.tpl',
      1 => 1479459114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582ec587651ee5_26265712 (Smarty_Internal_Template $_smarty_tpl) {
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
