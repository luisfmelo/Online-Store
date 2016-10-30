<?php
	
	include '../common/header.php';
    include_once('../../database/users.php');

	$customers = getCustomers();

?>

<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>
	
	<section id = "content">
		<table>
			<tr>
				<td> Username	</td>
				<td> Name		</td>
				<td> Email		</td>
				<td> Telefone	</td>
				<td> Morada		</td>
			</tr>
			<?php
			foreach ($customers as $customer) {
			  echo "<tr>";
						echo "<td>" . $customer['username'] .	"</td>";
						echo "<td>" . $customer['name']		.	"</td>";
						echo "<td>" . $customer['email']	.	"</td>";
						echo "<td>" . $customer['phone']	.	"</td>";
						echo "<td>" . $customer['adress']	.	"</td>";
			   echo "</tr>";
			}
			?>
		</table>

	</section>

</section>

<?php include '../common/footer.php';?>
