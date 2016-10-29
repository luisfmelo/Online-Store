<?php

  include_once('../../database/users.php');
  include_once('../../config/init.php');
  
  if (!isset($_POST['username']) || !isset($_POST['password']) ||
     !isset($_POST['name']) || !isset($_POST['email']) ||
	 !isset($_POST['phone']) || !isset($_POST['address']) ) {
		$_SESSION['error_messages'][] = 'There are some fields missing';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . '/pages/users/new_regist.php');
		exit;		
  }
  else{
	  $_SESSION['username'] = $_POST['username'];
  }
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name 	= $_POST['name'];
  $email 	= $_POST['email'];
  $phone 	= $_POST['phone'];
  $address 	= $_POST['address'];

  addNewUser($username, $password, $name, $email, $phone, $address);
  
  header("Location: $BASE_URL" . '/pages/books/list_all.php');

?>
