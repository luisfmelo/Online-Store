<?php
	include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/orders.php');

	$_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
	}

	$orderRef = $_GET['orderref'];

	if($_SESSION['admin']){
		$orderId = getIdByOrderState('ENVIADO');
		changeOrdersStateAdmin($orderRef, $orderId[0]['id']);
	}
	else {
		$orderId = getIdByOrderState('RECEBIDO');
		changeOrdersStateCustomer($orderRef, $orderId[0]['id']);
	}

	header('Location: ' . $BASE_URL . '/pages/orders/view_orders.php');
	exit;
?>
