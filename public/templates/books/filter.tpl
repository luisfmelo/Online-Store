<div class="row filter">
  <div>
    Ordenar:
      <select name="order" onchange="sortTheBooksNow()">
          {$smarty.get.sort}
          <option value='defaut'>Escolher</option>
          <option value='name_a'{(($smarty.get.sort=='name_a')?'selected':" ")}>Nome: A a Z</option>
          <option value='name_z'{(($smarty.get.sort=='name_z')?' selected':" ")}>Nome: Z a A</option>
          <option value='price_c'{(($smarty.get.sort=='price_c')?' selected':" ")}>Preço: Crescente</option>
          <option value='price_d'{(($smarty.get.sort=='price_d')?' selected':" ")}>Preço: Decrescente</option>
      </select>
  </div>
  <div>
    Livros por Pag:
      <select name="numberBooks" onchange="sortTheNumberBooksNow()">
          {$smarty.get.number_Books}
          <option value='6'>6</option>
          <option value='8' {(($smarty.get.number_Books=='8') ? ' selected': " ")}>8</option>
          <option value='10'{(($smarty.get.number_Books=='10')? ' selected': " ")}>10</option>
          <option value='12'{(($smarty.get.number_Books=='12')? ' selected': " ")}>12</option>
        ?>
      </select>
  </div>
</div>
