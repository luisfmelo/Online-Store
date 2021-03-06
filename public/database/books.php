<?php
/* Retorna num array todos os livros bem como suas informações */
  function listSomeBooks($search, $order, $limit, $offset, $all = false) {
    global $conn;
    $query =            "SELECT *
                         FROM e_store.books
                         WHERE ";
    $query .= "e_store.books.active = " . (($all) ? "false " : "true ");

    if ($search != '')
    {
      $search = str_replace(' ', ' & ', $search);
      // $query = $query . "WHERE e_store.books.title ILIKE '%" . $search . "%' ";
      $query = $query . "AND phrase @@ to_tsquery('portuguese','$search') ";
    }

    if ($order == 'name_a')
      $query = $query . "ORDER BY e_store.books.title ASC ";
    else if ($order == 'name_z')
      $query = $query . "ORDER BY e_store.books.title DESC ";
    else if ($order == 'price_d')
      $query = $query . "ORDER BY e_store.books.price DESC ";
    else if ($order == 'price_c')
      $query = $query . "ORDER BY e_store.books.price ASC ";
    else
      $query = $query . "ORDER BY e_store.books.ref ASC ";

    $query = $query .   "LIMIT :limit OFFSET :offset;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('limit' => $limit, 'offset' => $offset) );
    return $stmt->fetchAll();
  }

/* Recebe Array com informação de todos os livros de uma dada categoria */
  function listSomeBooksByCategory($ref, $order, $limit, $offset) {
    global $conn;
    $query =            "SELECT *
                         FROM e_store.categories
                         INNER JOIN e_store.books
                         ON e_store.categories.id = e_store.books.category
                         WHERE e_store.categories.ref = :ref AND e_store.books.active = true ";

    if ($order == 'name_a')
      $query = $query . "ORDER BY e_store.books.title ASC";
    else if ($order == 'name_z')
      $query = $query . "ORDER BY e_store.books.title DESC";
    else if ($order == 'price_d')
      $query = $query . "ORDER BY e_store.books.price DESC";
    else if ($order == 'price_c')
      $query = $query . "ORDER BY e_store.books.price ASC";

    $query = $query . " LIMIT :limit OFFSET :offset;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref, 'limit' => $limit, 'offset' => $offset) );
    return $stmt->fetchAll();
  }

/* Retorna o número total de livros resultantes de uma dada pesquisa */
  function TotalNumberSearchedBooks($search) {
    global $conn;
    $query =            "SELECT COUNT(*)
                         FROM e_store.books
                         WHERE e_store.books.active = true ";

   if ($search != '')
   {
     $search = str_replace(' ', ' & ', $search);
     //      $query = $query . "WHERE e_store.books.title ILIKE '%" . $search . "%' ";
     $query = $query . "AND phrase @@ to_tsquery('portuguese','$search') ";
   }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
  }

/* Recebe array com a informação de apens alguns livros -> páginas */
  function getSomeBooks($limit, $offset, $all = false){
  	global $conn;
    	$query =   "SELECT *
                  FROM e_store.categories
                  INNER JOIN e_store.books
                  ON e_store.categories.id = e_store.books.category ";
    if ( !$all )
      $query .=  "WHERE e_store.books.active = true ";
    $query    .= "ORDER BY books.ref ASC
                  LIMIT :limit OFFSET :offset;";

      $stmt = $conn->prepare($query);
      $stmt->execute( array('limit' => $limit, 'offset' => $offset) );
      return $stmt->fetchAll();
   }

/* Retorna o numero de livros existentes na BD */
 function getNoBooks() {
   global $conn;
   $query = "SELECT COUNT(id)
             FROM e_store.books
             WHERE e_store.books.active = true;";

   $stmt = $conn->prepare($query);
   $stmt->execute();
   return $stmt->fetchAll();
 }
/* Retorna o número total de livros de uma dada categoria */
  function TotalNumberBooksByCategory($ref) {
    global $conn;
    $query = "SELECT COUNT(*)
              FROM e_store.categories
              INNER JOIN e_store.books
              ON e_store.categories.id = e_store.books.category
              WHERE e_store.categories.ref = :ref AND e_store.books.active = true;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref) );
    return $stmt->fetchAll();
  }

/* Retorna todas as categorias existentes */
  function getBookCategories() {
    global $conn;
    $query = "SELECT *
              FROM e_store.categories";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

/* Mudar Estado de um livro com a referencia dada */
  function changeBookState($ref) {
    global $conn;

    $ref = strip_tags($ref);

    $query = "UPDATE e_store.books
              SET active = NOT(active)
              WHERE ref = :ref;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref) );
  }

/* Retorna o preço do livro com a referencia dada */
  function getBookPrice($ref){
    global $conn;
    $query = "SELECT price
              FROM e_store.books
              WHERE ref = :ref;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref) );
    return $stmt->fetchAll();
  }

/* Recebe array com referencias dos lvros que estao no carrinho de compras
   e retorna toda a informação necessária desses livros */
  function getSelectedBooks($cart){
	  global $conn;

	  $query = "SELECT *
				      FROM e_store.books
				      WHERE ref in (";

    // mete referencias dos livros entre virgulas
	  foreach($cart as $key => $value)
		  $query = $query . "'" . $key . "',";

	  $query = substr($query, 0, -1);
	  $query = $query . ');';

	  $stmt = $conn->prepare($query);
	  $stmt->execute();
	  return $stmt->fetchAll();

  }

/* Atualiza informações de um livro com uma dada referencia - preço e stock apenas */
  function updateBook($ref, $price, $stock){
    global $conn;

    $ref 	= strip_tags($ref);
    $price 	= strip_tags($price);
    $stock 	= strip_tags($stock);

    $query = "UPDATE e_store.books
              SET price = :price, stock = :stock
              WHERE ref = :ref;";

    $stmt = $conn->prepare ($query);
    $stmt->execute( array('ref' => $ref, 'price' => $price, 'stock' => $stock) );
  }

/* Atualiza informações de um livro com uma dada referencia */
  function updateBookInfo($ref, $newRef, $title, $author, $price, $cat, $stock, $descript, $active){
    global $conn;

    $ref 		= strip_tags($ref);
    $newRef 	= strip_tags($newRef);
    $title 		= strip_tags($title);
    $author 	= strip_tags($author);
    $price 		= strip_tags($price);
    $cat 		= strip_tags($cat);
    $stock 		= strip_tags($stock);
    $descript 	= strip_tags($descript);
    $active 	= strip_tags($active);

    $categoryName = getCategoryName($cat)['categoryname'];
    $search = $title . ' ' . $author . ' ' . $categoryName;

    $query = "UPDATE e_store.books
              SET ref = :newref,
                  title = :title,
                  author = :author,
                  price = :price,
                  category = :cat,
                  stock = :stock,
                  description = :descript,
                  phrase = to_tsvector('portuguese', :search),";


  	$query .= (($active) ? "active = true " : "active = false ");

  	$query .= "WHERE ref = :ref;";


    $stmt = $conn->prepare ($query);
    $stmt->execute( array('ref' => $ref,
                          'newref' => $newRef,
                          'title' => $title,
                          'author' => $author,
                          'price' => $price,
                          'cat' => $cat,
                          'stock' => $stock,
                          'descript' => $descript,
                          'search' => $search));
  }

/* Adiciona um novo livro à Base de Dados */
  function addNewBook($ref, $title, $author, $price, $cat, $description,  $stock){
  	global $conn;

    $ref 			= strip_tags($ref);
    $title 			= strip_tags($title);
    $author 		= strip_tags($author);
    $price 			= strip_tags($price);
    $cat 			= strip_tags($cat);
    $stock 			= strip_tags($stock);
    $description 	= strip_tags($description);

    $categoryName = getCategoryName($cat)['categoryname'];
    $search = $title . ' ' . $author . ' ' . $categoryName;

    $query = "INSERT INTO e_store.books
              VALUES (DEFAULT, :ref, :title, :author, :price, :cat, :description, :stock, DEFAULT, to_tsvector('portuguese', :search));";

    $stmt = $conn->prepare ($query);
    $stmt->execute( array('ref' => $ref,
                          'title' => $title,
                          'author' => $author,
                          'price' => $price,
                          'cat' => $cat,
                          'description' => $description == "" ? NULL : $description,
                          'search' => $search,
                          'stock' => $stock == "" ? 0 : $stock) );
  }

/* Recebe o nome da categoria e retorna o seu id */
  function getCategoryId($categoryName){
	  global $conn;

    $query = "SELECT e_store.categories.id
              FROM e_store.categories
			        WHERE categoryName = '$categoryName';";

	  $stmt = $conn->prepare($query);
	  $stmt->execute();
	  return $stmt->fetchAll();
	}

/* Recebe a referencia da category e retorna o nome */
  function getCategoryName($id){
	  global $conn;

    $query = "SELECT e_store.categories.categoryName
              FROM e_store.categories
			        WHERE id = $id;";

	  $stmt = $conn->prepare($query);
	  $stmt->execute();
	  return $stmt->fetch();
	}

/* Recebe o nome da categoria e retorna o seu id */
  function getCategoryRef($catId){
	  global $conn;

    $query = "SELECT e_store.categories.ref
              FROM e_store.categories
			        WHERE id = $catId;";

	  $stmt = $conn->prepare($query);
	  $stmt->execute();
	  return $stmt->fetchAll();
	}

/* Returna 1 ou 0 se referencia do livro já existe ou não */
  function refExist($ref) {
    global $conn;
    $query = "SELECT ref
              FROM e_store.books
              WHERE ref = :ref;";

    $stmt = $conn->prepare($query);
    $stmt->execute( array('ref' => $ref) );
    $res = $stmt->fetch();

    return $res['admin'] ? 1 : 0;
  }

/*Retorna detalhes de uma Encomenda */
  function getBookInfo($ref){
    global $conn;

    $query = "SELECT *
              FROM e_store.books
              INNER JOIN e_store.categories ON category=categories.id
              WHERE books.ref = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute( array($ref) );
    return $stmt->fetchAll();
  }

/*Retorna o stock de um livro com dada referencia */
  function getStock($ref){
    global $conn;

    $query = "SELECT stock
              FROM e_store.books
              WHERE books.ref = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute( array($ref) );
    return $stmt->fetch()['stock'];
}

/* Retorna referencia/titulo/autor de todos os livros */
  function listSimpleBooks(){
    global $conn;

    $query = "SELECT ref, title, author
              FROM e_store.books";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>
