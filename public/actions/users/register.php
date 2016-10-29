<?php
  print_r("PAGINA DE REGISTO");
  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  $username = $_POST['username'];
  print_r("$username");
  $password = $_POST['password'];
  $name 	= $_POST['name'];
  $email 	= $_POST['email'];
  $phone 	= $_POST['phone'];
  $address 	= $_POST['address'];
  
  //~ if (!isset($_POST['username']) || !isset($_POST['password']) ||
     //~ !isset($_POST['name']) || !isset($_POST['email']) ||
	 //~ !isset($_POST['phone']) || !isset($_POST['adress']) ) {
		//~ $_SESSION['error_messages'][] = 'There are some fields missing';
		//~ $_SESSION['form_values'] = $_POST;
		//~ header("Location: $BASE_URL" . '/pages/users/new_regist.php');
		//~ exit;		
  //~ }

  addNewUser($username, $password, $name, $email, $phone, $address);
  
  //~ header("Location: $BASE_URL");

  
?>
