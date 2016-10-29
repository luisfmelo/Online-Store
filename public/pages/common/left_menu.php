<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  //~ $username = $_SESSION['username']; 
  
  //~ $isAdmin = isAdmin($username);
?>

<section id = "leftmenu">
	
	<div class="row">
		<div class='left_options'>
			<a href='../users/view_profile.php'>
				Ver Perfil
			</a>
		</div>
	</div>
	
	<div class="row">
		<div class='left_options'>
			<a href='../users/edit_profile.php'>
				Editar Perfil
			</a>
		</div>
	</div>
	
</section>
