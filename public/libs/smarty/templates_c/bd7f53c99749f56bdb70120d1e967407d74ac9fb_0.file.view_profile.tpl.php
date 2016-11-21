<?php
/* Smarty version 3.1.30, created on 2016-11-21 18:12:31
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/view_profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5833390f36ba68_47976617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd7f53c99749f56bdb70120d1e967407d74ac9fb' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/users/view_profile.tpl',
      1 => 1479751858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/left_menu.tpl' => 1,
    'file:_messages/warn_msgs.tpl' => 1,
  ),
),false)) {
function content_5833390f36ba68_47976617 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:common/left_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="rightContent">
    <h2 class="bigTitle">
    <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value != $_GET['user'] && $_GET['user'] != '') {?>
      <span><?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['name'];?>
</span>
    <?php } else { ?>
      <span>O meu perfil
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/users/edit_profile.php?id=<?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
">
          <i class='fa fa-pencil' aria-hidden='true'></i>
        </a>
      </span>
      <?php }?>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Username:</strong>	<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['username'];?>
 <br />
        </span>
        <span>
          <strong>Nome:</strong>	  	<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['name'];?>
 <br />
        </span>
        <span>
          <strong>Email:</strong>		  <?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['email'];?>
 <br />
        </span>
        <span>
          <strong>Telefone:</strong>	<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['phone'];?>
 <br />
        </span>
        <span>
          <strong>Morada:</strong>		<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['address'];?>
 <br />
        </span>
      </div>
      <div class="right">
        <div class="photo">
          <img src="<?php echo $_smarty_tpl->tpl_vars['PHOTO']->value;?>
" alt="" />
        </div>
        <div class="changePhoto">
			<form enctype="multipart/form-data" method="POST" action= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/users/upload_profileImage.php?username=<?php echo $_smarty_tpl->tpl_vars['PROFILE']->value[0]['username'];?>
" >
<!--
				<input type="file" id="photoUp" multiple size="50">
-->
					<input name="userfile" type="file" id="photoUp"  />
				<input type="submit">
			</form>
        </div>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      <?php $_smarty_tpl->_subTemplateRender("file:_messages/warn_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>
  </div>
</div>
<?php }
}
