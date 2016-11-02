<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $username = $_SESSION['username'];

  $userProfile = getUserByUsername($username);

?>
<div class="row">

	<?php include '../common/left_menu.php'; ?>


	<section id = "content">
		<form method="POST" action= "<?=$BASE_URL?>/actions/users/change_profile.php">

			Nome:				<input type = "text"		name="name"		value="<?=$userProfile[0]['name']?>">		</input><br>
			Email:				<input type = "text"		name="email"	value="<?=$userProfile[0]['email']?>">		</input><br>
			Telefone:			<input type = "text"		name="phone"	value="<?=$userProfile[0]['phone']?>">		</input><br>
			Morada:				<input type = "text"		name="address"	value="<?=$userProfile[0]['address']?>">	</input><br>
			Password:			<input type = "password"	name="password"> 											</input><br>
			Confirmar Password: <input type = "password"	name="confirmPassword"> 									</input><br>

			<input type = "submit" name="cmdsubmit" value="Alterar"></input>

		</form>
	</section>

</div>
<?php include '../common/footer.php';?>
