<div class="messages" style="margin-top: -20px;">
  {include file='_messages/error_success_msgs.tpl'}
</div>
<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Referência:</strong>	{$smarty.get.id} <br />
        </span>
        <form id="editBook" enctype="multipart/form-data" ref="{$smarty.get.id}" class="myForms" name="EditBook" method="post" action= "{$BASE_URL}/actions/books/edit_book.php?id={$smarty.get.id}">
    			Titulo:  <br />
          <input type = "text" name="title" value="{$BOOK.0.title}"/><br>
    			Autor:  <br />
          <input type = "text"		name="author"	value="{$BOOK.0.author}"/><br>
    			Preço:  <br />
          <input type = "text"		name="price"	value="{$BOOK.0.price}"/><br>
          Categoria: <br />
          <Select name="category">
          {foreach $CATEGORIES as $CAT}
            <Option value='{$CAT.id}'
              {if $CAT.id == $BOOK.0.category}
                selected
              {/if}
              >{$CAT.categoryname}</Option> <br/>";
            {/foreach}
          </Select><br />
    			Stock:  <br />
          <input type = "text"		name="stock"	value="{$BOOK.0.stock}"/><br>
          Descrição:		<br />
          <textarea rows="13" cols="50" name="description" value="dd">{$BOOK.0.description}</textarea> <br />
          
           <Select name="state">
            <Option value='ativo'
              {if $BOOK.0.active}
                selected
              {/if}
              >Ativo</Option> <br/>
             <Option value='descontinuado'
              {if !$BOOK.0.active}
                selected
              {/if}
              >Descontinuado</Option> <br/>
          </Select><br />
		
		 <input style="margin-left:0" class="changePhoto" name="bookcover" type="file" id="photoUp"  />
		
          <div class="messages formMessages" style="margin-top: 20px;">
            {include file='_messages/warn_msgs.tpl'}
          </div>
	  
          <input type = "submit" value="Alterar"/>
    		</form>

      </div>
    </section>

  </div>
</div>

<!--
ADICIONAR DROP DOWN MENU COM DESCONTINUADO, ...
ADICIONAR ESTADO AO VIEW_BOOK-->
