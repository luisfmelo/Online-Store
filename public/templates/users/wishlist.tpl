<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Meus Favoritos</span>
    </h2>

    <section id = "book">
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
            <a class='btn'>
              <i class='fa fa-cart-plus' aria-hidden='true'></i>
              Adicionar
            </a>
          {/if}
            <a class= "favourite">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span hidden>{$book.ref}</span>
            </a>

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

  </div>
</div>
