<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $categories = getBookCategories();

?>

<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>

	<section id = "content">
		<form accept-charset="utf-8" method="GET" action= "<?=$BASE_URL?>/actions/books/add_book.php">

			Titulo:		<input type = "text"	name="title"		</input> <br>
			Autor:		<input type = "text"	name="author"		</input> <br>
			Descrição:	<input type = "text"	name="description"	</input> <br>
			
			Categoria:
			<Select name="category">
				<?php
				foreach ($categories as $category) 
					echo "<Option value='" .$category['categoryname']. "'>" . $category['categoryname'] . "</Option> <br/>";
				?>
			</Select>
			<br>
			Preço: 		<input type = "text"	name="price"		</input> <br>
			Stock: 		<input type = "text"	name="stock"		</input> <br>
			
			<input style="margin-bottom: 100px" type = "submit" name="cmdsubmit" value="Adicionar"></input>

		</form>	

	</section>

</section>

<?php include '../common/footer.php';?>
