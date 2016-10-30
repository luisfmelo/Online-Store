<?php
  /* Return 1 or 0 if login is correct or not */
  function isLoginCorrect($user, $pass) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.users
                            WHERE username = '$user' AND
                                  password = '$pass';");
    $stmt->execute();

    return $stmt->fetch() == true;
  }

  /* Return 1 or 0 if user is admin or not */
  function isAdmin($user) {
    global $conn;
    $stmt = $conn->prepare("SELECT admin
                            FROM e_store.users
                            WHERE username = '$user';");
    $stmt->execute();
    $res = $stmt->fetch();

    return $res['admin'] ? 1 : 0;
  }
  
  function addNewUser($user, $password, $name, $email, $phone, $address ){
	global $conn;
	$stmt = $conn->prepare ("INSERT INTO e_store.users
							VALUES (DEFAULT, '$user', '$password', '$name', '$email', '$phone', '$address', false);"); 
							
	$stmt->execute();
  }
  
  function removeUser($user){
	global $conn;
	$stmt = $conn->prepare ("DELETE FROM e_store.users 
							 WHERE username = '$user';");
							 
	$stmt->execute();
  }
  
  function editUser($user, $password, $name, $phone, $address, $email){
	global $conn;
	$stmt = $conn->prepare ("UPDATE e_store.users
							 SET password='$password', name='$name', phone='$phone', address='$address', email='$email'
							 WHERE username='$user';");
						
	$stmt->execute();
  }
  
  function getUserByUsername($username){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.users
							WHERE username = '$username';");

    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getCustomers(){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.users
							WHERE admin = false;");
	
	$stmt->execute();
	return $stmt->fetchAll();
  }
	  
    
?>
