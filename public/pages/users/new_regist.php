<?php
  include '../common/header.php';
?>


<form method="POST" action= "<?=$BASE_URL?>/actions/users/register.php"> 
	<section id = "books">
		
		Username:			<input type = "text" name="username"	size = 30></input> <br>
		Nome: 				<input type = "text" name="name"		size = 30></input> <br>
		Email:				<input type = "text" name="email"		size = 30></input> <br>
		Telefone:			<input type = "text" name="phone"		size = 30></input> <br>
		Morada:				<input type = "text" name="address"		size = 30></input> <br>
		Password:			<input type = "password" name="password"size = 30></input> <br>
		Confirmar Password: <input type = "password" name="confirmPassword"  size = 30></input> <br>
		
		<input type = "submit" name="cmdsubmit" value="OK"></input>
		
	</section>
</form>

<?php include '../common/footer.php';?>

