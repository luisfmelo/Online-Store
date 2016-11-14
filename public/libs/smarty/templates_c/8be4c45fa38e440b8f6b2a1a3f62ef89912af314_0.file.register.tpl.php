<?php
/* Smarty version 3.1.30, created on 2016-10-17 23:45:30
  from "/var/www/html/Fritter/templates/users/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5805467a197186_24502107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8be4c45fa38e440b8f6b2a1a3f62ef89912af314' => 
    array (
      0 => '/var/www/html/Fritter/templates/users/register.tpl',
      1 => 1476651884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_5805467a197186_24502107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h2>Register</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/register.php" method="post">
  <label>Name: <input type="text" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['realname'];?>
"></label><br>
  <label>Username: <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
"></label><br>
  <label>Password: <input type="password" name="password" value=""></label><br>
  <input type="submit" value="Register">
</form>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
