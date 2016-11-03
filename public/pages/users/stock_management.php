<?php
	
	include '../common/header.php';
    include_once('../../database/users.php');

	$limit = 10;
	$page_number = $_GET['page_number'];
	$number_of_books = getNoBooks();
	
	$max_no_page = $number_of_books[0]['count'] / $limit;

	if ($page_number + 1 > $max_no_page)
		$next = "NOTHING_TO_SHOW";
	else 
		$next = $page_number + 1;
		
	$previous = $page_number - 1;
	
	$books = getSomeBooks($limit, $page_number*$limit); //getSomeBooks(limit, offset)

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
			</tr>
			<?php
			foreach ($books as $book) {
			  echo "<tr>";
						echo "<td>" . $book['ref'] 		.	"</td>";
						echo "<td>" . $book['title']	.	"</td>";
						echo "<td>" . $book['author']	.	"</td>";
						echo "<td>" . $book['category']	.	"</td>";
						echo "<td> <input class=\"stock_input\" type=\"text\" name=\"stock\" value='" . $book['price'] . "'> </td>";
						echo "<td> <input class=\"stock_input\" type=\"text\" name=\"stock\" value='" . $book['stock'] . "'> </td>";
						echo "<td> <i onclick=\"deleteBookAlert('" . $book['ref'] ."')\" class=\"fa fa-trash\" aria-hidden=\"true\"></i> </td>";
			 echo "</tr>";
			}
			?>
		</table>
		<?php if ($page_number != 0)
				echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page_number=$previous\"> PREVIOUS </a>";
				
			  if ($next != "NOTHING_TO_SHOW")
				echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page_number=$next\"> NEXT </a>";
		?>
		<a href="<?=$BASE_URL?>/pages/books/new_book.php" id="registLink">
	
	</section>
	
</section>

<?php include '../common/footer.php';?>
