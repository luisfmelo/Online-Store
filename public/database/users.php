<?php
  /* Returna 1 ou 0 se login está correto ou não */
  function isLoginCorrect($user, $pass) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM e_store.users
                            WHERE username = '$user' AND
                                  password = '$pass';");
    $stmt->execute();

    return $stmt->fetch() == true;
  }

  /* Returna 1 ou 0 se user é admin ou não */
  function isAdmin($user) {
    global $conn;
    $query = "SELECT admin
              FROM e_store.users
              WHERE username = '$user';"

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->fetch();

    return $res['admin'] ? 1 : 0;
  }

/* Adiciona um novo utilizador à Base de Dados */
  function addNewUser($user, $name, $phone, $address, $password, $email){
  	global $conn;
    $query = "INSERT INTO e_store.users
              VALUES (DEFAULT, '$user', '$password', '".$name."', '$email', '".$phone."', '$address', false);";

    $stmt = $conn->prepare ($query);
  	$stmt->execute();
  }

/* Remove utilizador da Base de Dados */
  function removeUser($username){
  	global $conn;
    $query = "DELETE FROM e_store.users
  						WHERE username = '$username';"

  	$stmt = $conn->prepare ($query);
  	$stmt->execute();
  }

/* Edita dados do utilizador */
  function editUser($user, $password, $name, $phone, $address, $email){
    global $conn;
    $query = "UPDATE e_store.users
              SET password='$password', name='$name', phone='$phone', address='$address', email='$email'
              WHERE username='$user';";

	  $stmt = $conn->prepare ($query);
    $stmt->execute();
  }

/* Recebe username e retorna a informação desse mesmo utilizador */
  function getUserByUsername($username){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
							WHERE username = '$username';"

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/* Retorna todos os clientes da loja (não administradores) e suas informações*/
  function getCustomers(){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
							WHERE admin = false;"

    $stmt = $conn->prepare($query);
    $stmt->execute();
	  return $stmt->fetchAll();
  }

/* Verifica se um utilizador existe */
  function userExists($user){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
              WHERE username = '" . $user . "';"

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return count($stmt->fetchAll()) == 0 ? 1 : 0;
  }
?>
