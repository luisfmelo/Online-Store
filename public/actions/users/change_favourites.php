<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');
  include_once('../../database/users.php');

  $user = $_SESSION['username'];
  $ref = $_GET['ref'];
  $func = $_GET['func'];

//  $ref = getBookInfo($ref)[0]['id'];
  $user = getUserByUsername($user)[0]['id'];


  $res = ($func == 'favourite') ? addFavourite ($ref, $user) :
                                  removeFavourite ($ref, $user);
  print_r (getBookInfo($_GET['ref']));
?>
