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

          {* So mostra botão de adicionar se não for admin, tiver sessao iniciada e ainda haver em stock *}
          {if $USERNAME != '' && !$isADMIN && $book.stock != 0}
            <a class='btn' href='$BASE_URL/actions/orders/add_book_to_cart.php?id=$book.ref'>
              <i class='fa fa-cart-plus' aria-hidden='true'></i>
              Adicionar
            </a>
            {/if}

            {* Caso não tenha em stock, mostra Esgotado *}
            {* Em caso de não haver user logado, não mostra informação de stock *}
          {if $book.stock != 0 && $USERNAME != ''}
            <span class='inStock'>
              <small>Em Stock</small>
            </span>
          {else if $book.stock == 0 && $USERNAME != ''}
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
          {/if}
        </div>
        </article>
        {/foreach}
    </section>

    <div class="row arrows">
		{if $page != 0}
		  <a href="{$BASE_URL}/pages/books/list_books.php?page={$previous}{$param}\">
        <i class='fa fa-angle-double-left' aria-hidden='true'></i>
      </a>
    {/if}
    {if $max_no_page > 1}
      {for $i=0 to $max_no_page - 1}
        {if $i == $page}
          <a class="pageNumberSelected" href="{$BASE_URL}/pages/books/list_books.php?page={$i}{$param}"> {$i + 1} </a>
        {else}
          <a class="pageNumber" href="{$BASE_URL}/pages/books/list_books.php?page={$i}{$param}"> {$i + 1} </a>
        {/if}
      {/for}
    {/if}
    {if $next != "NOTHING_TO_SHOW"}
      <a href="{$BASE_URL}/pages/books/list_books.php?page={$next}{$param}">
        <i class='fa fa-angle-double-right' aria-hidden='true'></i>
      </a>
    {/if}
	</div>
</div>
