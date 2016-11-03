<?php
  function new_Order($ref, $total){
    global $conn;
    $query = "INSERT INTO e_store.orders
              VALUES (DEFAULT,
                      '" . $ref . "',
                      (select id from e_store.users where username = '" . $_SESSION['username'] . "'),
                      DEFAULT,
                      " . $total . ",
                      '" . date('Y-m-d G:i:s') . "',
                      NULL);";

    $stmt = $conn->prepare($query);
    $stmt->execute();
  }

  function add_Books_to_Order($ref){
    global $conn;
    $query =          "INSERT INTO e_store.productsordered
                       VALUES ";

    foreach ($_SESSION['cart'] as $k => $b) {
      if ( $k == "total" || $k == "checkout" )
        continue;
      $query = $query . "(DEFAULT,
                          (select id from e_store.books where ref = '" . $k . "'),
                          " . $b[0] . ",
                          (select id from e_store.orders where ref = '" . $ref . "')), ";
    }
    $query = substr($query, 0, -2) . ";";

    $stmt = $conn->prepare($query);
    $stmt->execute();
  }

  function updateStock(){
    global $conn;
    $query = "";

    foreach ($_SESSION['cart'] as $k => $b) {
      isset($b['stock']) ? $s = 0 :
                           $s = $b[0] - $b['stock'];

      if ( $k == "total" || $k == "checkout" )
        continue;
      $query = "UPDATE e_store.books
                SET stock =" . $s . "
                WHERE id = (select id from e_store.books where ref = '" . $k . "'); ";

      $stmt = $conn->prepare($query);
    }

    $stmt->execute();
  }

?>
