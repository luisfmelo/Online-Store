<?php
	include '../common/header.php';
  include_once('../../database/users.php');

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  /* página atual */
  if(!isset($_GET['page']))
		$page = 0;
  else
		$page = $_GET['page'];

  /* controlo icons previous/next */
  $limit = 10;
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
				<th> Preço 		</th>
				<th> Stock		</th>
				<th> 			</th>
				<th> 			</th>
				<th> 			</th>
			</tr>
			<?php
			foreach ($books as $book) {
				echo "<tr class='". $book['ref'] ."'>";
					echo "<td class='linkToUser'><a href='$BASE_URL/pages/books/view_book.php?id=".$book['ref']."'>" . $book['ref'] .	"</a></td>";
					echo "<td class='linkToUser'><a href='$BASE_URL/pages/books/view_book.php?id=".$book['ref']."'>" . $book['title'] .	"</a></td>";
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
				for ($i = 0; $i < $max_no_page; $i++){
					$number = $i + 1;
					if ($i == $page)
						echo "<a class=\"pageNumberSelected\" href=\"$BASE_URL/pages/users/stock_management.php?page=$i\">" .$number . "</a>";
					else
						echo "<a class=\"pageNumber\" href=\"$BASE_URL/pages/users/stock_management.php?page=$i\">" .$number . "</a>";
				}
				if ($next != "NOTHING_TO_SHOW")
					echo "<a href=\"$BASE_URL/pages/users/stock_management.php?page=$next\">
									<i class='fa fa-angle-double-right' aria-hidden='true'></i>
								</a>";
		?>
		</div>

		<a class="divlink row" href="<?=$BASE_URL?>/pages/books/new_book.php" id="registLink" > Novo Livro </a>

</div>

<?php include '../common/footer.php';?>
