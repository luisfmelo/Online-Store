<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  
  if ($_FILES['bookcover']['type'] == "image/png"){
	 
	$originalFileName = $IMG_DIR . '/covers/' . $id . '.png';
	
	$result = @imagecreatefrompng($originalFileName);
	
	if($result)
		move_uploaded_file($_FILES['bookcover']['tmp_name'], $originalFileName);
	else
		$_SESSION['error_messages'] = 'Upload failed';
		
  }	
  else
	$_SESSION['error_messages'] = 'Formato Inválido - Introduza Imagem com Extensão PNG';
	
  header("Location: $BASE_URL" . '/pages/books/view_book.php?id=' . $id);
  exit;
  

	
?>  
