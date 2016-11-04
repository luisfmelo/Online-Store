<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $categories = getBookCategories();

?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

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
    				<?php
    				foreach ($categories as $category)
    					echo "<Option value='" .$category['categoryname']. "'>" . $category['categoryname'] . "</Option> <br/>";
    				?>
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
      <?php include_once('../common/cart_msgs.php'); ?>
    </div>

  </div>
</div>
<?php include '../common/footer.php';?>
