<?php
/* Smarty version 3.1.30, created on 2016-11-21 11:39:06
  from "/var/www/public/templates/books/filter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5832dcda6a2fe6_26222018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4c8605263d328e067ad8ed9d60ed6dd6f585804' => 
    array (
      0 => '/var/www/public/templates/books/filter.tpl',
      1 => 1479728344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5832dcda6a2fe6_26222018 (Smarty_Internal_Template $_smarty_tpl) {
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
