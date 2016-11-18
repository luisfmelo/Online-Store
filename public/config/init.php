<?php
  session_start();
  if ( $_SERVER['HTTP_HOST'] === '192.168.33.10')
    session_set_cookie_params(3600, '~/Online-Store/public'); // usando vagrant
  else
    session_set_cookie_params(3600, '~/ee12103/trabalhosSIEM/Online-Store/public'); // servidor da feup

  include_once 'dbconfig.php';

  $BASE_DIR = dirname(__DIR__); // '/var/www/public/';
  $BASE_URL = '../..'; //$_SERVER['HTTP_HOST'];
  $IMG_DIR = '../../images';

// include Smarty Template Engine library
  include_once($BASE_DIR . '/libs/smarty/Smarty.class.php');

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

// Smarty Template Engine
  $smarty = new Smarty();

  $smarty->error_reporting = E_ALL & ~E_NOTICE;
  $smarty->template_dir = $BASE_DIR . '/templates/';
  $smarty->compile_dir = $BASE_DIR . '/libs/smarty/templates_c/';

  $smarty->assign('BASE_URL', $BASE_URL);
  $smarty->assign('BASE_DIR', $BASE_DIR);
  $smarty->assign('IMG_DIR', $IMG_DIR);
  $smarty->assign('GMAPS_API_KEY', $GMAPS_API_KEY);
  $smarty->assign('USERNAME', $_SESSION['username']);
  $smarty->assign('isADMIN', $_SESSION['admin']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('ERROR_MESSAGE', $ERROR_MESSAGE);
  $smarty->assign('SUCCESS_MESSAGE', $SUCCESS_MESSAGE);
  $smarty->assign('CART_MESSAGE', $CART_MESSAGE);
  $smarty->assign('INFO_MESSAGE', $INFO_MESSAGE);
  $smarty->assign('WARNING_MESSAGE', $WARN_MESSAGE);

  unset($_SESSION['form_values']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['success_messages']);
  unset($_SESSION['cart_messages']);
  unset($_SESSION['info_messages']);
  unset($_SESSION['warning_message']);
?>
