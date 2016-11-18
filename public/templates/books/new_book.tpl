<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Adicionar Livro</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form id="newBook" class="myForms">
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

    			<input type = "button" onClick="NewBookCheck()" value="Adicionar"></input>
    		</form>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      {include file='_messages/warn_msgs.tpl'}
    </div>

  </div>
</div>
