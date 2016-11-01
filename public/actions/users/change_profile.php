<?php
	
  include_once('../../database/users.php');
  include_once('../../config/init.php');

  if (!isset($_POST['password']) || !isset($_POST['name']) || 
      !isset($_POST['email']) || !isset($_POST['phone']) || 
      !isset($_POST['address']) ) {
		$_SESSION['error_messages'][] = 'There are some fields missing';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
		exit;		
  }
  else{
	  $username = $_SESSION['username'];
	  $password = $_POST['password'];
	  $name 	= $_POST['name'];
	  $email 	= $_POST['email'];
      $phone 	= $_POST['phone'];
      $address 	= $_POST['address'];
  }

  editUser($username, $password, $name, $phone, $address, $email);
  
  header("Location: $BASE_URL" . '/pages/users/view_profile.php');

?>
