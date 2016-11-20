<?php
/* Retorna o numero de encomendas existentes na BD */
  function getNoOrders($user, $isadmin) {
    global $conn;
    $query =             "SELECT COUNT(*)
                          FROM e_store.orders";
    if (!isadmin)
      $query = $query . " INNER JOIN e_store.users ON orders.userid = users.id
                          WHERE username = '".$user."';";
                          
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/* Recebe uma referencia gerada e o total da transação e
   Adiciona uma nova encomenda ao utiliador atual da Sessão*/
  function new_Order($ref, $total){
    global $conn;
    $query = "INSERT INTO e_store.orders
              VALUES (DEFAULT,
                      :ref,
                      (select id from e_store.users where username = :user),
                      DEFAULT,
                      :total,
                      '" . date('Y-m-d G:i:s') . "',
                      NULL);";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref ,'total' => $total ,'user' => $_SESSION['username']) );
  }

/* Adiciona livros que estão na variavel de sessao do carrinho de compras
   a uma encomenda efetuada com uma dada referencia */
  function add_Books_to_Order($ref){
    global $conn;
    $query = "INSERT INTO e_store.productsordered
              VALUES ";


/* Percorre carrinho de compras e constroi query*/
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

/* Faz update do stock aos produtos em carrinho */
  function updateStock(){
    global $conn;

    // cria uma query para atualizar o stock por cada produto
    foreach ($_SESSION['cart'] as $key => $value) {
      if ( $key == "total" || $key == "checkout" )
        continue;
      // se para um produto do carrinho existir um campo de stock significa que
      // a quantidade pedida é superior ao stock logo novo stock = 0
      // caso contrario stock = stock anterior - quantidade encomendada
      isset($value['stock']) ? $stck = 0 :
                               $stck = $value[0] - $value['stock'];

      $query = "UPDATE e_store.books
                SET stock =" . $stck . "
                WHERE id = (select id from e_store.books where ref = '" . $key . "'); ";

      // adiciona query de um certo produto
      $stmt = $conn->prepare($query);
    }

    $stmt->execute();
  }

/* retorna todas as encomendas se utilizador é admin
   Caso contrário, retorna as encomenda desse mesmo utilizador */
  function getOrdersByUsername($isAdmin, $user){
	  global $conn;

	  if ($isAdmin == 1)
      $query = "SELECT *
  				      FROM e_store.orders
  				      INNER JOIN e_store.users
  				      ON e_store.orders.userid = e_store.users.id;";

    else{
		  $query = "SELECT *
				        FROM e_store.orders
				        INNER JOIN e_store.users
				        ON e_store.orders.userid = e_store.users.id
				        INNER JOIN e_store.ordersstate
				        ON e_store.orders.id = e_store.ordersstate.id
				        WHERE username = :user";
      $stmt->bindParam(':user', $user);
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/* Retorna os estados possiveis da encomendas */
  function getOrdersState() {
    global $conn;
    $query = "SELECT *
              FROM e_store.ordersstate";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/*Retorna as encomendas de um dado utilizador */
  function getOrdersCustomer($username, $limit, $offset){
    global $conn;

    $query = "SELECT *
              FROM e_store.orders
              INNER JOIN e_store.users
              ON e_store.orders.userid = e_store.users.id
              INNER JOIN e_store.ordersstate
              ON e_store.orders.state = e_store.ordersstate.id
              WHERE username = '$username'
              LIMIT '$limit' OFFSET '$offset';";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/*Retorna todas as encomendas*/
  function getOrdersAdmin($limit, $offset, $sort){
    global $conn;

    $query =             "SELECT *
                          FROM e_store.orders
                          INNER JOIN e_store.users
                          ON e_store.orders.userid = e_store.users.id
                          INNER JOIN e_store.ordersstate
                          ON e_store.orders.state = e_store.ordersstate.id ";

    if ( $sort === "up")
      $query = $query .  "ORDER BY username ASC ";
    else if ( $sort === "down")
      $query = $query .  "ORDER BY username DESC ";

    $query = $query .    "LIMIT '$limit' OFFSET '$offset' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/*Retorna o id correspondente a um determinado estado de encomenda */
  function getIdByOrderState ($orderState) {
    global $conn;
    $query = "SELECT id
              FROM e_store.ordersstate
              WHERE orderstatename='$orderState';";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/*Atualiza o estado de uma encomenda para ENVIADO*/
  function changeOrdersStateAdmin($orderref, $orderStateId) {
    global $conn;

    $query = "UPDATE e_store.orders
              SET state='$orderStateId'
              WHERE ref='$orderref';";

    $stmt = $conn->prepare($query);
    $stmt->execute();
  }

/*Atualiza o Estado para RECEBIDO e a Data de Entrega*/
  function changeOrdersStateCustomer($orderref, $orderStateId) {
    global $conn;

    $query = "UPDATE e_store.orders
              SET state='$orderStateId', deliverydate='" . date('Y-m-d G:i:s') . "'
              WHERE ref='$orderref';";

    $stmt = $conn->prepare($query);
    $stmt->execute();
  }

/*Retorna detalhes de uma Encomenda */
  function getOrderInfo($ref){
    global $conn;

    $query = "SELECT e_store.books.ref,
                     e_store.books.title,
                     e_store.books.price,
                     e_store.productsordered.quantity,
                     e_store.orders.orderdate,
                     e_store.orders.deliverydate,
                     e_store.users.username
              FROM e_store.productsordered
              INNER JOIN e_store.orders ON productsordered.orderid = orders.id
              INNER JOIN e_store.books ON productsordered.bookid = books.id
              INNER JOIN e_store.users ON orders.userid = users.id
              WHERE orders.ref = '".$ref."';";
    $stmt = $conn->prepare($query);
    $stmt->execute( );
    return $stmt->fetchAll();
  }
?>
