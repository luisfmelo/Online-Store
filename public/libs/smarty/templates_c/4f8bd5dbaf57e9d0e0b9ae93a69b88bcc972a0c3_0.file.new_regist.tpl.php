<?php
/* Smarty version 3.1.30, created on 2016-11-18 09:09:53
  from "/var/www/public/templates/users/new_regist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ec561177db5_47380489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f8bd5dbaf57e9d0e0b9ae93a69b88bcc972a0c3' => 
    array (
      0 => '/var/www/public/templates/users/new_regist.tpl',
      1 => 1479460187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages/error_success_msgs.tpl' => 1,
  ),
),false)) {
function content_582ec561177db5_47380489 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Novo Registo</title>
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
/actions/users/register.php" method="post" onsubmit="return validateRegister();">

      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/index.php" id="auth_logo">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/logo.png" alt="" />
      </a>

      <!-- USERNAME -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
">
        <i class="fa fa-user"></i>
      </div>

      <!-- NAME -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['nome'];?>
">
        <i class="fa fa-address-card" aria-hidden="true"></i>
      </div>

      <!-- MORADA -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Morada" name="morada" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['morada'];?>
">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
      </div>

      <!-- TELEFONE -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['telefone'];?>
">
        <i class="fa fa-phone"></i>
      </div>

      <!-- EMAIL -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </div>

      <!-- PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['password'];?>
">
        <i class="fa fa-lock"></i>
      </div>

      <!-- CONFIRMAR PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirmar Password" name="confirmPassword">
        <i class="fa fa-lock"></i>
      </div>

      <div class="messages" style="margin-top: 10px;">
        <?php $_smarty_tpl->_subTemplateRender("file:_messages/error_success_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>

      <input type="submit" class="log-btn" value="Registar" />

      <div class="goToRegister">
        Já é membro?
  			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/login.php">
          Faça Log in <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>

    </form>
  </body>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
