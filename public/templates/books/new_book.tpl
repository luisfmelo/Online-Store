<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Adicionar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form id="newBook" class="myForms" name="NewRegist" method="get" action= "{$BASE_URL}/actions/books/add_book.php"
    			Titulo:		<br />
          <input type = "text"	name="title"/> <br />
    			Autor:		<br />
          <input type = "text"	name="author"/> <br />
    			Descrição:		<br />
          <textarea rows="6" cols="50" name="description"></textarea> <br />
    			Categoria: <br />
          <Select name="category">
    				{foreach $CATEGORIES as $CAT}
    					<Option value='{$CAT.categoryname}'>{$CAT.categoryname}</Option> <br/>";
    				{/foreach}
    			</Select>
    			<br>
    			Preço:		<br />
          <input type = "text"	name="price"		</input> <br>
    			Stock:		<br />
          <input type = "text"	name="stock"		</input> <br>

          <div class="messages formMessages" style="margin-top: 20px;">
            {include file='_messages/warn_msgs.tpl'}
          </div>

    			<input type = "submit" value="Adicionar"></input>
    		</form>
      </div>
    </section>


  </div>
</div>
