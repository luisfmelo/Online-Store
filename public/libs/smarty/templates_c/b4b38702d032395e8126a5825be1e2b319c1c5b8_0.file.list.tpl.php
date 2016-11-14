<?php
/* Smarty version 3.1.30, created on 2016-10-21 22:38:43
  from "/var/www/public/templates/tweets/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580a98f32a4873_87529779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4b38702d032395e8126a5825be1e2b319c1c5b8' => 
    array (
      0 => '/var/www/public/templates/tweets/list.tpl',
      1 => 1477084255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_580a98f32a4873_87529779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section id="tweets">
  <h2>Tweets</h2>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tweets']->value, 'tweet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->value) {
?>

  <article class="tweet">
    <span class="realname"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['realname'];?>
</span>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/tweets/list_user.php?username=<?php echo $_smarty_tpl->tpl_vars['tweet']->value['username'];?>
" class="username">@<?php echo $_smarty_tpl->tpl_vars['tweet']->value['username'];?>
</a>
    <span class="time"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['time'];?>
</span>
    <div class="tweet-text"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['text'];?>
</div>
  </article>

  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


</section>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
