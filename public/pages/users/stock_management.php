<?php
	include '../common/header.php';
  include_once('../../database/users.php');

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !isAdmin($_SESSION['username']) )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

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
<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Stock</span>
    </h2>
		<table class="gerir">
			<tr>
				<th> Ref	</th>
				<th> Título		</th>
				<th> Autor		</th>
				<th> Preço 		</th>
				<th> Stock		</th>
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
						echo "<td> <input class=\"stock_input\"  type=\"text\" name=\"stock\" value='" . $book['price'] . "'> </td>";
						echo "<td> <input class=\"stock_input\"  type=\"text\" name=\"stock\" value='" . $book['stock'] . "'> </td>";
						echo "<td> <i onclick=\"deleteBookAlert('" . $book['ref'] ."')\" class=\"fa fa-trash\" aria-hidden=\"true\"></i> </td>";
						echo "<td> <i onclick=\"stockChangeCheck('" . $book['ref'] ."' , '" . $page ."' )\" class=\"fa fa-floppy-o\" aria-hidden=\"true\"> </i> </td>";
			 echo "</tr>";
			}
			?>
		</table>
		<div class="row arrows">

		<?php
				if ($page != 0)
					echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page=$previous\">
						<i class='fa fa-angle-double-left' aria-hidden='true'></i>
					</a>";

				if ($next != "NOTHING_TO_SHOW")
					echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page=$next\">
						<i class='fa fa-angle-double-right' aria-hidden='true'></i>
					</a>";
		?>
		</div>

		<a class="divlink row" href="<?=$BASE_URL?>/pages/books/new_book.php" id="registLink" > Novo Livro </a>

</div>

<?php include '../common/footer.php';?>
