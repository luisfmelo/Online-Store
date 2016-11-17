<?php
/* Smarty version 3.1.30, created on 2016-11-17 09:52:30
  from "/var/www/public/templates/users/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582d7dde8abd38_16494785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6a647c3a98ab19fd764be1a799c85f78e64b8c8' => 
    array (
      0 => '/var/www/public/templates/users/login.tpl',
      1 => 1479376344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages/error_success_msgs.tpl' => 1,
  ),
),false)) {
function content_582d7dde8abd38_16494785 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Log in</title>
    <meta charset="utf-8">

    <!-- Include da font-stack escolhida -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <!-- Include da nossa folha de estilos CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/css/style.css">
    <!-- Include Font Awesome lib - for icons -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="authent_bckgd_img"></div>
    <form class="login-form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/login.php" method="post">

      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/index.php" id="auth_logo">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/logo.png" alt="" />
      </a>

      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
">
        <i class="fa fa-user"></i>
      </div>

      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['password'];?>
">
        <i class="fa fa-lock"></i>
      </div>

      <div class="messages msg_forms" style="margin-top: 10px;">
        <?php $_smarty_tpl->_subTemplateRender("file:_messages/error_success_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>

      <input type="submit" class="log-btn" value="Log in" />

      <div class="goToRegister">
        Não tem conta?
  			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/new_regist.php">
          Registe-se <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>


    </form>
  </body>
</html>
<?php }
}
