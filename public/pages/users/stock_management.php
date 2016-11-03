<?php
	
	include '../common/header.php';
    include_once('../../database/users.php');

	$limit = 10;
	$page = $_GET['page'];
	
	$number_of_books = getNoBooks();
	
	$max_no_page = $number_of_books[0]['count'] / $limit;
	
	if ($page + 1 > $max_no_page)
		$next = "NOTHING_TO_SHOW";
	else 
		$next = $page + 1;
		
	$previous = $page - 1;
	
	$books = getSomeBooks($limit, $page*$limit); //getSomeBooks(limit, offset)


?>

<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>
	
	<section id = "content">
		<table>
			<tr>
				<td> Referência	</td>
				<td> Título		</td>
				<td> Autor		</td>
				<td> Categoria	</td>
				<td> Preço 		</td>
				<td> Stock		</td>
				<td> 			</td>
				<td> 			</td>
				<td> 			</td>
			</tr>
			<?php
			foreach ($books as $book) {
			  echo "<tr class='". $book['ref'] ."'>";
						echo "<td>" . $book['ref'] 		.	"</td>";
						echo "<td>" . $book['title']	.	"</td>";
						echo "<td>" . $book['author']	.	"</td>";
						echo "<td>" . $book['categoryname']	.	"</td>";
						echo "<td> <input class=\"stock_input\"  type=\"text\" name=\"stock\" value='" . $book['price'] . "'> </td>";
						echo "<td> <input class=\"stock_input\"  type=\"text\" name=\"stock\" value='" . $book['stock'] . "'> </td>";
						echo "<td> <i onclick=\"deleteBookAlert('" . $book['ref'] ."')\" class=\"fa fa-trash\" aria-hidden=\"true\"></i> </td>";
						echo "<td> <i onclick=\"stockChangeCheck('" . $book['ref'] ."' , '" . $page ."' )\" class=\"fa fa-floppy-o\" aria-hidden=\"true\"> </i> </td>";
			 echo "</tr>";
			}
			?>
		</table>
		<?php if ($page != 0)
				echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page=$previous\"> PREVIOUS </a>";
				
			  if ($next != "NOTHING_TO_SHOW")
				echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page=$next\"> NEXT </a>";
		?>
		<a style="margin-bottom: 100px" href="<?=$BASE_URL?>/pages/books/new_book.php" id="registLink" > Novo Livro </a>
	
</section>

<?php include '../common/footer.php';?>
