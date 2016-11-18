<?php
/* Smarty version 3.1.30, created on 2016-11-18 10:10:31
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582ec5876139e7_75807946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecb38d033197656cc6645c7206678be5b5cef8d3' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/common/header.tpl',
      1 => 1479459114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/menu_logged_in.tpl' => 1,
    'file:common/menu_logged_out.tpl' => 1,
    'file:../messages/error_success_msgs.tpl' => 1,
    'file:../messages/msg_cart_added.tpl' => 1,
  ),
),false)) {
function content_582ec5876139e7_75807946 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blooks</title>
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
    <div class="wrapper">
      <header>
        <div class="row upper-bar">
          <div class="leftMenu">
            <ul class="navbar">
              <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/list_books.php">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </a>
              </li>

              <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/index.php">
                  <i class="fa fa-envelope" aria-hidden="true"></i> Contactem-nos
                </a>
              </li>
  <!-- A implementar: não critico
              <li>
                <a href="$BASE_URL<?php echo '?>';?>/pages/common/faq.php">
                  FAQ
                </a>
              </li>-->
            </ul>
          </div>
          <div class="rightMenu">
            <ul class="navbar">
            <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value != '') {?>
              <?php $_smarty_tpl->_subTemplateRender("file:common/menu_logged_in.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php } else { ?>
              <?php $_smarty_tpl->_subTemplateRender("file:common/menu_logged_out.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            </ul>
          </div>
        </div>

        <div class="row bottom-bar">
          <div class="content">
            <div class="logo">
              <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/books/list_books.php"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/images/logo.png" alt="" /></a>
            </div>
              <form id="searchForm" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/actions/books/search.php" method="get">
                <a class="divlink" id="lupa" onclick="toggleSearchBar()"><i class="fa fa-search" aria-hidden="true"></i></a>
                <input id="searchBar" name="search" type="search" placeholder="Pesquise aqui...">
              </form>
          </div>
        </div>

        <div class="messages" style="margin-bottom: 20px;">
          <?php if ($_smarty_tpl->tpl_vars['success']->value != '') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:../messages/error_success_msgs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php $_smarty_tpl->_subTemplateRender("file:../messages/msg_cart_added.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php }?>
        </div>
      </header>
<?php }
}
