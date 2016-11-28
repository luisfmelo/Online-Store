<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>{$BOOK.0.title}
      {if $isADMIN }
        <a href='{$BASE_URL}/pages/books/edit_book.php?id={$smarty.get.id}'>
          <i class='fa fa-pencil' aria-hidden='true'></i>
        </a>
      {/if}
      </span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	{$smarty.get.id} <br />
        </span>
        <span>
          <strong>Titulo:</strong>	  	{$BOOK.0.title} <br />
        </span>
        <span>
          <strong>Autor:</strong>		  {$BOOK.0.author} <br />
        </span>
        <span>
          <strong>Preço:</strong>	{$BOOK.0.price} €<br />
        </span>
        <span>
          <strong>Categoria:</strong>		{$BOOK.0.categoryname} <br />
        </span>
        <span>
          <strong>Stock:</strong>
          {if isADMIN }
            {$BOOK.0.stock}<br />
          {else if $BOOK.stock !== 0 }
            <span class='inStock'>
              <small>Em Stock</small>
            </span><br />
          {else if $BOOK.stock === 0 }
            <span class='soldOut'>
              <small>Esgotado</small>
            </span><br />
          {/if}
        </span>
      </div>
      <div class="right">
        <div class="photo">
          <img src="{$COVER}" alt="" />
        </div>
        <div class="changePhoto">
			<form enctype="multipart/form-data" method="POST" action= "{$BASE_URL}/actions/books/update_book_coverage.php?id={$smarty.get.id}" >
				<input name="bookcover" type="file" id="photoUp"  />
			<input type="submit">
        </div>
      </div>
    </section>
    <div class="description row">
      <span>
        <strong>Descrição:</strong>		{$BOOK.0.description} <br />
      </span>
    </div>


    <div class="messages" style="margin-bottom: 20px;">
      {include file='_messages/warn_msgs.tpl'}
    </div>

  </div>
</div>
