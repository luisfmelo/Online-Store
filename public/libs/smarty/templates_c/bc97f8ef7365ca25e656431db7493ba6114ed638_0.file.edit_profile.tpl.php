<?php
/* Smarty version 3.1.30, created on 2016-11-21 15:34:50
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/edit_profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5833141ad458b3_88250300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc97f8ef7365ca25e656431db7493ba6114ed638' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/edit_profile.tpl',
      1 => 1479742489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_5833141ad458b3_88250300 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Perfil</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form method="POST" action= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/change_profile.php" class="myForms" id="editProfile">
    			Nome:  <br />
          <input type = "text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['name'];?>
"/><br>
    			Email:  <br />
          <input type = "text"		name="email"	value="<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['email'];?>
"/><br>
    			Telefone:  <br />
          <input type = "text"		name="phone"	value="<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['phone'];?>
"/><br>
    			Morada:  <br />
          <input type = "text"		name="address"	value="<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['address'];?>
"/><br>
    			Password:  <br />
          <input type = "password"	name="password"/><br>
    			Confirmar Password:  <br />
          <input type = "password"	name="confirmPassword"/><br>
				Upload Profile Image: 
		  <input type="file" name="img">
		
    	  <input type = "submit" name="cmdsubmit" value="Alterar"/>
    	
    	</form>
    			
      </div>
    </section>
    
    <form onSubmit="validateImage()">
	  Select a file: <input type="file" name="img">
	  <input type="submit">
	</form>

    <div class="messages" style="margin-bottom: 20px;">
      <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

  </div>
</div>
<?php }
}
