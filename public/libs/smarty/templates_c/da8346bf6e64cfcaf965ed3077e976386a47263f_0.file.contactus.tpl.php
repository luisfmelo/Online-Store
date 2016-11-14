<?php
/* Smarty version 3.1.30, created on 2016-11-14 12:33:09
  from "/var/www/public/templates/common/contactus.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829af051dd0a0_61491852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da8346bf6e64cfcaf965ed3077e976386a47263f' => 
    array (
      0 => '/var/www/public/templates/common/contactus.tpl',
      1 => 1479126788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_5829af051dd0a0_61491852 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
  <div class="leftContent team" style="width:60%;">
    <div class="memberInfo">
      <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/lidia.png" alt="Lídia Cerqueira" />
      <p>
        Lídia Cerqueira
      </p>
      <p>
        ee12023@fe.up.pt
      </p>
      <p>
        up201205960
      </p>
    </div>
    <div class="memberInfo">
      <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/luis.png" alt="Luís Melo" />
      <p>
        Luís Melo
      </p>
      <p>
        ee12103@fe.up.pt
      </p>
      <p>
        up201206020
      </p>
    </div>
    <p>
      Mestrado Integrado Em engenharia Eletrotécnica e de Computadores
    </p>
    <p>
      <strong>FEUP</strong>
    </p>
  </div>
  <div class="rightContent info" style="width:40%;">
    <div class="map">
      <iframe frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJe-0hW0BkJA0RCSzGfvIWkwg&key=<?php echo $_smarty_tpl->tpl_vars['GMAPS_API_KEY']->value;?>
" allowfullscreen>
      </iframe>
    </div>
    <div class="additionalInfo">
      <p>
        <strong>Estado do Trabalho 2: </strong> Concluído
      </p>
      <!--<p>
        <strong>Estado do Trabalho 3: </strong> A Desenvolver
      </p>-->
      <p>
        <strong>Optimizado para: </strong> Chrome &amp; Brave Browser com monitor 15''
      </p>
      <p>
        <strong>Credenciais Cliente: </strong> client/client
      </p>
      <p>
        <strong>Credenciais Administrador: </strong> admin/admin
      </p>
    </div>
    <div class="row linkButtons">
      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/../downloads/201205960_201206020_SIEM_ppt.pptx" target="_blank" download>
          PPT
      </a>
      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/../downloads/201205960_201206020_SIEM_css.css" target="_blank" download>
          CSS
      </a>
      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/../downloads/201205960_201206020_SIEM_T2.rar" target="_blank" download>
          ZIP
      </a>
    </div>
  </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
