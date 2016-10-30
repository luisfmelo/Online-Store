<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $username = $_SESSION['username'];

  $userProfile = getUserByUsername($username);
?>

<section id = "mainContent">

	<?php include '../common/left_menu.php'; ?>

	<section id = "content">
		Username:	<?=$userProfile[0]['username'];?> <br>
		Nome:		<?=$userProfile[0]['name'];?> <br>
		Email:		<?=$userProfile[0]['email'];?> <br>
		Telefone:	<?=$userProfile[0]['phone'];?> <br>
		Morada:		<?=$userProfile[0]['address'];?> <br>
	</section>

</section>

<?php include '../common/footer.php';?>
