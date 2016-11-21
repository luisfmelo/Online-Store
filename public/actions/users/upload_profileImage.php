<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  $username = $_GET['username'];
  
  $originalFileName = $IMG_DIR . '/profiles/' . $username . '.png';
  
  move_uploaded_file($_FILES['userfile']['tmp_name'], $originalFileName);
  

  //~ if (!imagecreatefromjpeg($originalFileName)){
	//~ if(!imagecreatefrompng($originalFileName))
	//~ echo "FAIL";
		//~ $_SESSION['error_messages'] = 'Formato Inválido';
  //~ }
  //~ else
	//~ echo "SUCCESS";
  
  header("Location: $BASE_URL" . '/pages/users/view_profile.php');
	exit;
	
?>  
