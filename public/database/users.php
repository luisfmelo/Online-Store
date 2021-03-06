<?php
  /* Returna 1 ou 0 se login está correto ou não */
  function isLoginCorrect($user, $pass) {
    global $conn;
    $query = "SELECT *
              FROM e_store.users
              WHERE username = :user AND
                    password = :pass;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('user' => $user, 'pass' => $pass) );
    return $stmt->fetch() == true;
  }

  /* Returna 1 ou 0 se user é admin ou não */
  function isAdmin($user) {
    global $conn;
    $query = "SELECT admin
              FROM e_store.users
              WHERE username = :user;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('user' => $user) );
    $res = $stmt->fetch();

    return $res['admin'] ? 1 : 0;
  }

/* Adiciona um novo utilizador à Base de Dados */
  function addNewUser($user, $name, $phone, $addr, $pass, $email){
  	global $conn;

  	$user 	= strip_tags($user);
  	$name 	= strip_tags($name);
  	$phone	= strip_tags($phone);
  	$addr 	= strip_tags($addr);
  	$pass 	= strip_tags($pass);
  	$email 	= strip_tags($email);

    $query = "INSERT INTO e_store.users
              VALUES (DEFAULT, :user, :pass, :name, :email, :phone, :addr, false);";

    $stmt = $conn->prepare ($query);
  	$stmt->execute( array('user' => $user,
                          'pass' => $pass,
                          'name' => $name,
                          'email' => $email,
                          'phone' => $phone,
                          'addr' => $addr) );
  }

/* Edita dados do utilizador */
  function editUser($user, $name, $phone, $addr, $email){
    global $conn;

  	$user 	= strip_tags($user);
  	$name 	= strip_tags($name);
  	$phone	= strip_tags($phone);
  	$addr 	= strip_tags($addr);
  	$email 	= strip_tags($email);

    $query = "UPDATE e_store.users
              SET name=:name, phone=:phone, address=:addr, email=:email
              WHERE username='$user';";

	  $stmt = $conn->prepare ($query);
    $stmt->execute( array('name' => $name,
                          'email' => $email,
                          'phone' => $phone,
                          'addr' => $addr) );
  }

 /* Edita a Password do utilizador */
  function editUserPass($user, $pass){
    global $conn;

    $user = strip_tags($user);
    $pass = strip_tags($pass);

    $query = "UPDATE e_store.users
              SET password   = :pass
              WHERE username = :user";

	  $stmt = $conn->prepare ($query);
    $stmt->execute( array('user' => $user,
                          'pass' => $pass) );
  }

/* Recebe username e retorna a informação desse mesmo utilizador */
  function getUserByUsername($user){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
							WHERE username = :user;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('user' => $user) );
    return $stmt->fetchAll();
  }

/* Retorna todos os clientes da loja (não administradores) e suas informações*/
  function getCustomers(){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
							WHERE admin = false;";

    $stmt = $conn->prepare($query);
    $stmt->execute();
	  return $stmt->fetchAll();
  }

/* Verifica se um utilizador existe */
  function userExists($user){
    global $conn;
    $query = "SELECT *
              FROM e_store.users
              WHERE username = :user;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('user' => $user) );
    return count($stmt->fetchAll()) == 0 ? 1 : 0;
  }

/* Adiciona livro com referencia ref aos favoritos do utilizador */
  function addFavourite ($ref, $user){
    global $conn;

    $ref	= strip_tags($ref);
    $user	= strip_tags($user);

    removeFavourite($ref, $user);

    $query = "INSERT INTO e_store.likes
              VALUES (DEFAULT, ?, (select id FROM e_store.books WHERE ref = ?));";

    try{
      $stmt = $conn->prepare($query);
      $stmt->execute(array($user, $ref));
    } catch(Exception $e){
      return false;
    }

    return true;
  }

/* Adiciona livro com referencia ref aos favoritos do utilizador */
  function removeFavourite ($ref, $user){
    global $conn;

    $query = "DELETE FROM e_store.likes
              WHERE userid = ? AND
                    bookid = (select id FROM e_store.books WHERE ref = ?) ;";

    try{
      $stmt = $conn->prepare($query);
      $stmt->execute(array($user, $ref));
    } catch(Exception $e){
      return false;
    }

    return true;
  }

/* Get Favourite Books From a user */
  function getFavouriteBooks($user){
    global $conn;
    $query = "SELECT e_store.books.*
              FROM e_store.likes
              INNER JOIN e_store.users ON userid = users.id
              INNER JOIN e_store.books ON bookid = books.id
              WHERE username = :user;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('user' => $user) );
    return $stmt->fetchAll();
  }
?>
