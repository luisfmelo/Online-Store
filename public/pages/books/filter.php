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
  <div>
    Livros por Pag:
      <select name="numberBooks" onchange="sortTheNumberBooksNow()">
        <?php
          echo $_GET['number_Books'];
          echo "<option value='6'" . (($_GET['number_Books']=='6' || !isset($_GET['number_Books']))?'selected':" ") . " >6</option>";
          echo "<option value='8'" . (($_GET['number_Books']=='8')?' selected':" ") . " >8</option>";
          echo "<option value='10'" . (($_GET['number_Books']=='10')?' selected':" ") . " >10</option>";
          echo "<option value='12'" . (($_GET['number_Books']=='12')?' selected':" ") . " >12</option>";
        ?>
      </select>
  </div>
</div>
