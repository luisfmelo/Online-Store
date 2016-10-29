<?php
  include '../common/header.php';
  include_once('../../database/users.php');
  
  $username = $_SESSION['username'];
  
  $userProfile = getUserByUsername($username);

?>


<section id = "mainContent">
	
	<?php include '../common/left_menu.php'; ?>
	

	<section id = "content">
<!--
		<form method="POST" action= "<?=$BASE_URL?>/actions/users/change_profile.php"> 
		
				Nome: 				<input type = "text"		name="name"				size = 30	placeholder="Lidia Cerqueira"></input> <br>
				Email:				<input type = "text"		name="email"			size = 30	placeholder="l@gmail.com"></input> <br>
				Telefone:			<input type = "text"		name="phone"			size = 30	placeholder="123456789"></input> <br>
				Morada:				<input type = "text"		name="address"			size = 30	placeholder="rua das flores"></input> <br>
				Password:			<input type = "password"	name="password"			size = 30	></input> <br>
				Confirmar Password: <input type = "password"	name="confirmPassword"	size = 30	></input> <br>
				
				<input type = "submit" name="cmdsubmit" value="Alterar"></input>
		</form>
-->
		
		

				<form method="POST" action= "<?=$BASE_URL?>/actions/users/change_profile.php"> 
		
				Nome: 				<input type = "text"		name="name"				size = 30	placeholder=<?$userProfile['name']?>></input> <br>
				Email:				<input type = "text"		name="email"			size = 30	placeholder=$userProfile['email']></input> <br>
				Telefone:			<input type = "text"		name="phone"			size = 30	placeholder=$userProfile['phone']></input> <br>
				Morada:				<input type = "text"		name="address"			size = 30	placeholder=$userProfile['address']></input> <br>
				Password:			<input type = "password"	name="password"			size = 30	></input> <br>
				Confirmar Password: <input type = "password"	name="confirmPassword"	size = 30	></input> <br>
				
				<input type = "submit" name="cmdsubmit" value="Alterar"></input>
				
		</form>


		
	</section>


</section>


<?php include '../common/footer.php';?>
