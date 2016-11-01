<?php
	
	include '../common/header.php';
    include_once('../../database/users.php');

	$limit = 10;
	$page_number = $_GET['page_number'];
	
	$next = $page_number + 1;
	$previous = $page_number - 1;
	

	$books = getSomeBooks($limit, $page_number*10); //getSomeBooks(limit, offset)
	print_r($somebooks);
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
				<td> Preço		</td>
				<td> Stock		</td>
			</tr>
			<?php
			foreach ($books as $book) {
			  echo "<tr>";
						echo "<td>" . $book['ref'] 		.	"</td>";
						echo "<td>" . $book['title']	.	"</td>";
						echo "<td>" . $book['author']	.	"</td>";
						echo "<td>" . $book['category']	.	"</td>";
						echo "<td>" . $book['price']	.	"</td>";
						echo "<td> <i class=\"fa fa-trash\" aria-hidden=\"true\"></i> </td>";
			   echo "</tr>";
			}
			?>
		</table>
		<a href="<?=$BASE_URL?>/pages/users/stock_management.php?page_number=<?=$next?>"> NEXT </a>
		<?php if ($page_number != 0){
			echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page_number=$previous\"> PREVIOUS </a>";
		}
		?>
	
	
</section>

<?php include '../common/footer.php';?>
