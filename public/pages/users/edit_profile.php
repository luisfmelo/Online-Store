<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $username = $_SESSION['username'];

  $userProfile = getUserByUsername($username);
	print_r($userProfile[0]['email']);
?>


<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>


	<section id = "content">
				<form method="POST" action= "<?=$BASE_URL?>/actions/users/change_profile.php">

				Nome:			<input type = "text" name="name" value="<?=$userProfile[0]['name']?>"> <br>
				Email:		<input type = "text" name="email" value="<?=$userProfile[0]['email']?>"> <br>
				Telefone:	<input type = "text" name="phone" value="<?=$userProfile[0]['phone']?>"> <br>
				Morada:		<input type = "text" name="address" value="<?=$userProfile[0]['address']?>"> <br>
				Password:	<input type = "password" name="password"> <br>
				Confirmar Password: <input type = "password"	name="confirmPassword" /> <br>

				<input type = "submit" name="cmdsubmit" value="Alterar"></input>

		</form>



	</section>


</section>


<?php include '../common/footer.php';?>
