<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  if ($_FILES['userfile']['type'] == "image/png"){
	 $username = $_GET['username'];
	 
	 $originalFileName = $IMG_DIR . '/profiles/' . $username . '.png';
	 move_uploaded_file($_FILES['userfile']['tmp_name'], $originalFileName);
	 
	 $result = @imagecreatefrompng($originalFileName);
	 if(!$result)
		$_SESSION['error_messages'] = 'Upload failed';
  }	
  else
	$_SESSION['error_messages'] = 'Formato Inválido - Introduza Imagem com Extensão PNG';
	

  header("Location: $BASE_URL" . '/pages/users/view_profile.php');
	exit;
	
?>  
