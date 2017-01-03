<!-- LISTA DE CATEGORIAS - ALINHADA À ESQUERDA -->
<div class="row">
  <div class="leftContent">
    <a class='itemMenu divlink' href='{$BASE_URL}/pages/books/list_books.php'>
        Todos os Livros
    </a>
  {foreach $CATEGORIES as $cat}
    <a class='itemMenu divlink' href='list_books.php?id={$cat.ref}'>
      {$cat.categoryname}
    </a>
  {/foreach}
  </div>

<!-- LISTA DE LIVROS - ALINHADOS A DIREITA -->
  <div class="rightContent">
  {include file='books/filter.tpl'}


    <section id="books">
      {foreach $BOOKS as $book}
        <article class='book'>
          <a href='{$BASE_URL}/pages/books/view_book.php?id={$book.ref}'>
            {if file_exists("$IMG_DIR/covers/`$book.ref`.png")}
              <img class='cover' src="{$IMG_DIR}/covers/{$book.ref}.png"/>
            {else}
              <img class='cover' src="{$IMG_DIR}/covers/default.png"/>
            {/if}
          </a>

          <div class='book-data'>
            <span class='title'>
              <a href='{$BASE_URL}/pages/books/view_book.php?id={$book.ref}' class='titleLink'>
                {$book.title}
              </a>
            </span><br />

            <span class='author'>{$book.author}</span><br />
            <span class='descript'>{$book.description}</span><br />
          </div>

          <div class='addBtn'>
            <span class='price'>€ {$book.price}</span><br />

          {* So mostra botão de adicionar se não for admin e ainda haver em stock *}
          {if !$isADMIN && $book.stock != 0}
            <a class='btn'>
              <i class='fa fa-cart-plus' aria-hidden='true'></i>
              Adicionar
            </a>
          {/if}

          {* Caso não tenha em stock, mostra Esgotado *}
          {if $book.stock != 0 }
            <span class='inStock'>
              <small>Em Stock</small>
            </span>
          {else if $book.stock == 0 }
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
          {/if}
          <a class= "favourite">

          {if $USERNAME != '' && in_array($book.ref, $FAVOURITES) }
            <i class="fa fa-heart" aria-hidden="true"></i>
          {elseif $USERNAME != '' && !in_array($book.ref, $FAVOURITES) }
            <i class="fa fa-heart-o" aria-hidden="true"></i>
          {/if}
            <span hidden>{$book.ref}</span>
          </a>
        </div>
        </article>
        {/foreach}
    </section>

    <div class="row arrows">
	{*if $page != 1}
		<a href="{$BASE_URL}/pages/books/list_books.php?page={$previous}{$param}\">
			<i class='fa fa-angle-double-left' aria-hidden='true'></i>
		</a>
    {/if}
    {if $max_no_page > 1}
      {for $i=1 to $max_no_page}
        {if $i == $page}
          <a class="pageNumberSelected" href="{$BASE_URL}/pages/books/list_books.php?page={$i}{$param}"> {$i} </a>
        {else}
          <a class="pageNumber" href="{$BASE_URL}/pages/books/list_books.php?page={$i}{$param}"> {$i} </a>
        {/if}
      {/for}
    {/if}
    {if $next != "NOTHING_TO_SHOW"}
      <a href="{$BASE_URL}/pages/books/list_books.php?page={$next}{$param}">
        <i class='fa fa-angle-double-right' aria-hidden='true'></i>
      </a>
    {/if*}
    {if $page != 1}
      <a>
        <i class='fa fa-angle-double-left' aria-hidden='true'></i>
      </a>
      {/if}
      {if $max_no_page > 1}
        {for $i=1 to $max_no_page}
          {if $i == $page}
            <a class="pageNumberSelected"> {$i} </a>
          {else}
            <a class="pageNumber"> {$i} </a>
          {/if}
        {/for}
      {/if}
      {if $next != "NOTHING_TO_SHOW"}
        <a>
          <i class='fa fa-angle-double-right' aria-hidden='true'></i>
        </a>
      {/if}
	</div>
  <span id='futurePage' style='display:none'>
    {$page}
  </span>
</div>
