<?php
  session_start();
//  session_set_cookie_params(3600, '~/Online-Store/public'); // usando vagrant
  session_set_cookie_params(3600, '~/ee12103/trabalhosSIEM/Online-Store/public'); // servidor da feup

  include_once 'dbconfig.php';

  $BASE_DIR = dirname(dirname(__FILE__)); // '/var/www/public/';
  $BASE_URL = '../..';
  $IMG_DIR = '../../images';

  $conn = new PDO('pgsql:host=' . $host . ';dbname=' . $db, $username, $password);

  if ( $conn == NULL )
    die("Error connecting to Database");

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/** VARIAVEIS DE SESSAO: MENSAGENS **/
  $FORM_VALUES = $_SESSION['form_values'];
  $ERROR_MESSAGE =  $_SESSION['error_messages'];
  $SUCCESS_MESSAGE = $_SESSION['success_messages'];
  $CART_MESSAGE = $_SESSION['cart_messages'];
  $INFO_MESSAGE = $_SESSION['info_messages'];
  $WARN_MESSAGE = $_SESSION['warning_message'];

  unset($_SESSION['form_values']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['success_messages']);
  unset($_SESSION['cart_messages']);
  unset($_SESSION['info_messages']);
  unset($_SESSION['warning_message']);
?>
