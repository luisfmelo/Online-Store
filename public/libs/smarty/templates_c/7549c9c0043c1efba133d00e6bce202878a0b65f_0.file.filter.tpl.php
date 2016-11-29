<?php
/* Smarty version 3.1.30, created on 2016-11-28 22:52:38
  from "/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/books/filter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583cb5368126a9_40445267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7549c9c0043c1efba133d00e6bce202878a0b65f' => 
    array (
      0 => '/usr/users2/mieec2012/ee12023/public_html/Online-Store/public/templates/books/filter.tpl',
      1 => 1480370271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583cb5368126a9_40445267 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row filter">
  <div>
    Ordenar:
      <select name="order" id="changeOrderBooks">
          <?php echo $_GET['sort'];?>

          <option value='defaut'>Escolher</option>
          <option value='name_a'<?php echo ($_GET['sort'] == 'name_a' ? 'selected' : " ");?>
>Nome: A a Z</option>
          <option value='name_z'<?php echo ($_GET['sort'] == 'name_z' ? ' selected' : " ");?>
>Nome: Z a A</option>
          <option value='price_c'<?php echo ($_GET['sort'] == 'price_c' ? ' selected' : " ");?>
>Preço: Crescente</option>
          <option value='price_d'<?php echo ($_GET['sort'] == 'price_d' ? ' selected' : " ");?>
>Preço: Decrescente</option>
      </select>
  </div>
  <div>
    Livros por Pag:
      <select name="numberBooks" id="changeNoBooks">
          <?php echo $_GET['number_Books'];?>

          <option value='6'>6</option>
          <option value='8' <?php echo ($_GET['number_Books'] == '8' ? ' selected' : " ");?>
>8</option>
          <option value='10'<?php echo ($_GET['number_Books'] == '10' ? ' selected' : " ");?>
>10</option>
          <option value='12'<?php echo ($_GET['number_Books'] == '12' ? ' selected' : " ");?>
>12</option>
        <?php echo '?>';?>
      </select>
  </div>
</div>
<?php }
}
