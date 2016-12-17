<?php
/* Smarty version 3.1.30, created on 2016-12-16 12:36:57
  from "/var/www/html/Online-Store/public/templates/users/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853d1d96279d6_51119018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '788f0ca76c589b4c641853427f772b097d00056d' => 
    array (
      0 => '/var/www/html/Online-Store/public/templates/users/login.tpl',
      1 => 1481888212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages/error_success_msgs.tpl' => 1,
  ),
),false)) {
function content_5853d1d96279d6_51119018 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Log in</title>
    <meta charset="utf-8">
    <link rel="icon"
          type="image/png"
          href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/icon.png">
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
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/libs/jquery/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/js/validate.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
