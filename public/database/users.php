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
  
?>
