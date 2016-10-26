<?php
  //session_start();
  //session_set_cookie_params(3600, '~/Online-Store/public'); //alterar quando estamos a trabalhar fora da root: ~/ee12103/Fritter

  include_once 'dbconfig.php';

  $BASE_DIR = dirname(dirname(__FILE__)) . '/'; // '/var/www/public/';
  $BASE_URL = '../..';

  $conn = new PDO('pgsql:host=' . $host . ';dbname=' . $db, $username, $password);

  if ( $conn == NULL )
    die("Error connecting to Database");

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

?>