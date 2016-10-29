<?php
  include '../common/header.php';
  include_once('../../database/users.php');
  
  //~ $username = $_SESSION['username'];
  
  //~ $userProfile = getUserByUsername($username);
  
?>

<section id = "mainContent">
	
	<?php include '../common/left_menu.php'; ?>
	
	<section id = "content">
<!--
		Username:	. $userProfile['username']; <br>
		Nome:		. $userProfile['name']; <br>			
		Email:		. $userProfile['email']; <br>		
		Telefone:	. $userProfile['phone']; <br>			
		Morada:		. $userProfile['address']; <br>
-->
		Username:	Lidia2; <br>
		Nome:		Lidia; <br>			
		Email:		l@gmail.com; <br>		
		Telefone:	123456789 <br>			
		Morada:		rua das flores <br>
	</section>

</section>



<?php include '../common/footer.php';?>
