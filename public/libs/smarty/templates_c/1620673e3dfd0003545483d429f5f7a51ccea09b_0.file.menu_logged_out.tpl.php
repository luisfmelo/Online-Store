<?php
/* Smarty version 3.1.30, created on 2017-01-07 12:13:50
  from "/var/www/public/templates/common/menu_logged_out.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5870db7ec95d24_61386803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1620673e3dfd0003545483d429f5f7a51ccea09b' => 
    array (
      0 => '/var/www/public/templates/common/menu_logged_out.tpl',
      1 => 1483791209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5870db7ec95d24_61386803 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/login.php">
    Login
  </a>
</li>
<li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/register.php" id="registLink">
    Registo
  </a>
</li>
<li>
  <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/orders/shopping_cart.php' id='cart'>
    <span>
      <?php if ($_smarty_tpl->tpl_vars['CART_COUNTER']->value > 0) {?>
        <?php echo $_smarty_tpl->tpl_vars['CART_COUNTER']->value;?>

      <?php } else { ?>
        0
      <?php }?>
    </span>
    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
  </a>
</li>
<?php }
}
