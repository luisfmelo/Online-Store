<?php
  include_once('../config/init.php');
  include_once('../database/books.php');
  include_once('../database/users.php');

  if ( $_SESSION['admin'])
    exit;

  $user = $_SESSION['username'];
  $ref = $_GET['ref'];
  $func = $_GET['func'];

  $user = getUserByUsername($user)[0]['id'];


  $res = ($func === 'favourite') ? addFavourite ($ref, $user) :
                                  removeFavourite ($ref, $user);
?>
