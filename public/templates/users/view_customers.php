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

	$customers = getCustomers();
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Clientes</span>
    </h2>
		<table class="gerir gerirClientes">
			<tr>
				<th> Username	</th>
				<th> Name		</th>
				<th> Email		</th>
				<th> Telefone	</th>
				<th> Morada		</th>
				<th>	</th>
			</tr>
			<?php
			foreach ($customers as $customer) {
				echo "<tr>";
						echo "<td class='linkToUser'><a href='view_profile.php?user=".$customer['username']."'>" . $customer['username'] .	"</a></td>";
						echo "<td>" . $customer['name']		.	"</td>";
						echo "<td>" . $customer['email']	.	"</td>";
						echo "<td>" . $customer['phone']	.	"</td>";
						echo "<td>" . $customer['address']	.	"</td>";
						echo "<td> <i onclick=\"deleteCustomerAlert('" . $customer['username'] ."')\" class=\"fa fa-trash\" aria-hidden=\"true\"></i> </td>";
				 echo "</tr>";
			}
			?>
		</table>
</div>

<?php include '../common/footer.php';?>
