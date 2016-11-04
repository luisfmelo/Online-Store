<div class="row filter">
  <div>
    Ordenar:
      <select name="order" onchange="sortTheBooksNow()">
        <?php
          echo $_GET['sort'];
          echo "<option value='defaut'>Escolher</option>";
          echo "<option value='name_a'" . (($_GET['sort']=='name_a')?'selected':" ") . " >Nome: A a Z</option>";
          echo "<option value='name_z'" . (($_GET['sort']=='name_z')?' selected':" ") . " >Nome: Z a A</option>";
          echo "<option value='price_c'" . (($_GET['sort']=='price_c')?' selected':" ") . " >Preço: Crescente</option>";
          echo "<option value='price_d'" . (($_GET['sort']=='price_d')?' selected':" ") . " >Preço: Decrescente</option>";
        ?>
      </select>
  </div>
</div>
